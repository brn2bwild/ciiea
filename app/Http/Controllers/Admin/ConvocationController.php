<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\convocationUpdateRequest;
use App\Http\Requests\UploadSingleImageRequest;
use App\Models\Convocation;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class ConvocationController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Convocations/Index', [
			'convocations' => fn () => Convocation::select(
				'id',
				'name',
				'date_time',
				'location',
			)
				->with('image')
				->get()
				->each(function ($convocation, $index) {
					$convocation->date = $convocation->date_time->isoFormat('LL');
					$convocation->time = $convocation->date_time->isoFormat('h:mm');
				})
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Convocation::create([
			'name' => $request->name,
			'location' => $request->location,
			'date' => $request->date,
			'time' => $request->time,
			'description' => $request->description,
			'slug' => Str::slug($request->name),
		]);
		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Convocations/Edit', [
			'convocation' => fn () => Convocation::where('id', $request->id)
				->select(
					'id',
					'name',
					'date_time',
					'location',
					'description'
				)
				->with('image')
				->first()
		]);
	}

	public function update(convocationUpdateRequest $request): RedirectResponse
	{
		Convocation::findOrFail($request->input('id'))
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$convocation = Convocation::findOrFail($request->input('id'));

		$convocation->detachImage();

		$convocation->delete();

		return Redirect::back();
	}

	public function uploadImage(UploadSingleImageRequest $request): RedirectResponse
	{
		$convocation = Convocation::findOrFail($request->input('id'));

		$convocation->attachImage($request);

		return Redirect::route('admin.convocations.edit', $request->input('id'));
	}

	public function deleteImage(Request $request): RedirectResponse
	{
		$convocation = Convocation::findOrFail($request->input('id'));

		$convocation->detachImage();

		return Redirect::back();
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConvocationUpdateRequest;
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
			'convocations' => fn () => Convocation::with('image')
				->paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Convocation::create([
			'name' => $request->name,
			'location' => $request->location,
			'date_time' => Carbon::createFromDate($request->date . $request->time),
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

	public function update(ConvocationUpdateRequest $request): RedirectResponse
	{
		Convocation::findOrFail($request->input('id'))
			->update($request->validated());

		return back()->with('success', '');
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

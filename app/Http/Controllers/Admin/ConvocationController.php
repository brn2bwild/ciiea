<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\convocationUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Convocation;
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
				'date',
				'time',
				'location',
			)
				->get()
				->transform(fn ($convocation) => [
					'id' => $convocation->id,
					'name' => $convocation->name,
					'date' => $convocation->date,
					'time' => $convocation->time,
					'location' => $convocation->location,
				])
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Convocation::create([
			'name' => $request->name,
			'location' => $request->location,
			'date' => $request->date,
			'time'=> $request->time,
			'description' => $request->description,
			'slug' => Str::slug($request->name),
		]);
		return back()->with('success','');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Convocations/Edit', [
			'convocation' => fn() => Convocation::where('id', $request->id)
				->select(
					'id',
					'name',
					'date',
					'time',
					'location',
					'description'
				)
				->with('file')
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

		$convocation->detachFile();

		$convocation->delete();

		return Redirect::back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$convocation = Convocation::findOrFail($request->input('id'));

		$convocation->attachFile($request);

		return Redirect::route('admin.convocations.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$convocation = Convocation::findOrFail($request->input('id'));

		$convocation->detachFile();

		return Redirect::back();
	}
}

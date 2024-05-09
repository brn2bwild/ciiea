<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\softwareUpdateRequest;
use App\Http\Requests\UploadSingleImageRequest;
use App\Models\Software;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class EducationalSoftwareController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Software/Index', [
			'software_resources' => fn () => Software::with('image')
				->paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Software::create([
			'name' => $request->name,
			'description' => $request->description,
		]);

		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Software/Edit', [
			'software' => fn () => Software::where('id', $request->id)
				->with('image')
				->first()
		]);
	}

	public function update(softwareUpdateRequest $request): RedirectResponse
	{
		Software::findOrFail($request->input('id'))
			->update($request->validated());

		return back()->with('success', '');
	}

	public function destroy(Request $request): RedirectResponse
	{
		$software = Software::findOrFail($request->input('id'));

		$software->detachImage();

		$software->delete();

		return back()->with('success', '');
	}

	public function uploadImage(UploadSingleImageRequest $request): RedirectResponse
	{
		$software = Software::findOrFail($request->input('id'));

		$software->attachImage($request);

		return Redirect::route('admin.software.edit', $request->input('id'));
	}

	public function deleteImage(Request $request): RedirectResponse
	{
		$software = Software::findOrFail($request->input('id'));

		$software->detachImage();

		return back();
	}
}

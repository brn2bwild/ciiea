<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoftwareUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Requests\UploadSingleImageRequest;
use App\Http\Resources\EducationalSoftwareResource;
use App\Models\Software;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class EducationalSoftwareController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Software/Index', [
			'software_resources' => fn() => Software::with('image')
				->with('file')
				->paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		$slug = Str::slug($request->name);

		Software::create([
			'name' => $request->name,
			'description' => $request->description,
			'slug' => $slug,
		]);

		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Software/Edit', [
			'software' => fn() => EducationalSoftwareResource::make(Software::where('id', $request->id)->first())
		]);
	}

	public function update(SoftwareUpdateRequest $request): RedirectResponse
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

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$software = Software::findOrFail($request->input('id'));

		$software->attachFile($request);

		return Redirect::route('admin.software.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$software = Software::findOrFail($request->input('id'));

		$software->detachFile();

		return Redirect::back();
	}
}

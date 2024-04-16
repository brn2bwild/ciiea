<?php

namespace App\Http\Controllers;

use App\Http\Requests\resourceUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ResourceController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Resources/Index', [
			'resources' => fn () => Resource::get()
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Resource::create([
			'name' => $request->name,
			'description' => $request->description
		]);

		return back();
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Resources/Edit', [
			'resource' => fn () => Resource::where('id', $request->id)
				->with('file')
				->first()
		]);
	}

	public function update(resourceUpdateRequest $request): RedirectResponse
	{
		Resource::findOrFail($request->input('id'))
			->update($request->validated());

		return back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$resource = Resource::findOrFail($request->input('id'));

		$resource->detachFile();

		$resource->delete();

		return back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$resource = Resource::findOrFail($request->input('id'));

		$resource->attachFile($request);

		return Redirect::route('admin.resources.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$resource = Resource::findOrFail($request->input('id'));

		$resource->detachFile();

		return back();
	}
}

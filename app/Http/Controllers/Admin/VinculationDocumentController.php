<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\VinculationDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class VinculationDocumentController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/VinculationDocuments/Index', [
			'resources' => fn () => VinculationDocument::paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		VinculationDocument::create([
			'name' => $request->name,
			'description' => $request->description
		]);

		return back();
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/VinculationDocuments/Edit', [
			'resource' => fn () => VinculationDocument::where('id', $request->id)
				->with('file')
				->first()
		]);
	}

	public function update(ResourceUpdateRequest $request): RedirectResponse
	{
		VinculationDocument::findOrFail($request->input('id'))
			->update($request->validated());

		return back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$resource = VinculationDocument::findOrFail($request->input('id'));

		$resource->detachFile();

		$resource->delete();

		return back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$resource = VinculationDocument::findOrFail($request->input('id'));

		$resource->attachFile($request);

		return Redirect::route('admin.vinculation-documents.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$resource = VinculationDocument::findOrFail($request->input('id'));

		$resource->detachFile();

		return back();
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\publicationUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Publication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Publications/Index', [
			'publications' => fn() => Publication::select(
				'id',
				'title',
				'publicated_at'
			)
			->get()
			->transform(fn($publication) => [
				'id' => $publication->id,
				'title' => $publication->title,
				'publicated_at' => date('d M Y', strtotime($publication->publicated_at))
			]),
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Publication::create([
			'title'=> $request->title,
			'publicated_at' => $request->publicated_at,
			'slug' => Str::slug(($request->title)),
		]);
		return back()->with('success','');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Publications/Edit', [
			'publication' => fn () => Publication::where('id', $request->id)
				->select(
					'id',
					'title',
					'publicated_at'
				)
				->with('file')
				->first()
		]);
	}

	public function update(publicationUpdateRequest $request): RedirectResponse
	{
		Publication::findOrFail($request->input('id'))
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$publication = Publication::findOrFail($request->input('id'));

		$publication->detachFile();

		$publication->delete();

		return Redirect::back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$publication = publication::findOrFail($request->input('id'));

		$publication->attachFile($request);

		return Redirect::route('admin.historical-publications.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$publication = publication::findOrFail($request->input('id'));

		$publication->detachFile();

		return Redirect::back();
	}
}

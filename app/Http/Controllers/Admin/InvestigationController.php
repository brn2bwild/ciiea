<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\investigationUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Investigation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class InvestigationController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Investigations/Index', [
			'investigations' => fn () => Investigation::select(
				'id',
				'title',
				'authors',
				'short_description',
				'publicated_at'
			)
				->with('file')
				->get()
				->transform(fn ($investigation) => [
					'id' => $investigation->id,
					'title' => $investigation->title,
					'authors' => $investigation->authors,
					'short_description' => $investigation->short_description,
					'publicated_at' => date('d M Y', strtotime($investigation->publicated_at)),
					'file' => $investigation->file
				]),
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Investigation::create([
			'title' => $request->title,
			'authors' => $request->authors,
			'short_description' => $request->short_description,
			'publicated_at' => $request->publicated_at,
			'slug' => Str::slug($request->title),
		]);
		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Investigations/Edit', [
			'investigation' => fn () => Investigation::where('id', $request->id)
				->select(
					'id',
					'title',
					'authors',
					'short_description',
					'publicated_at'
				)
				->with('file')
				->first()
		]);
	}

	public function update(investigationUpdateRequest $request): RedirectResponse
	{
		investigation::findOrFail($request->input('id'))
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$investigation = Investigation::findOrFail($request->input('id'));

		$investigation->detachFile();

		$investigation->delete();

		return Redirect::back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$investigation = Investigation::findOrFail($request->input('id'));

		$investigation->attachFile($request);

		return Redirect::route('admin.investigations.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$investigation = investigation::findOrFail($request->input('id'));

		$investigation->detachFile();

		return Redirect::back();
	}
}

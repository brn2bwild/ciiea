<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MagazineUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Magazine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class MagazineController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Magazines/Index', [
			'magazines' => Magazine::select(
				'id',
				'name',
				'publicated_at',
			)
				->get()
				->transform(fn ($magazine) => [
					"id" => $magazine->id,
					"name" => ucwords($magazine->name),
					"publicated_at" => date("d M Y", strtotime($magazine->publicated_at)),
				]),
		]);
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Magazines/Edit', [
			'magazine' => fn () => Magazine::where('id', $request->id)
				->select(
					'id',
					'name',
					'publicated_at'
				)
				->with('file')
				->first()
		]);
	}

	public function update(MagazineUpdateRequest $request): RedirectResponse
	{
		Magazine::findOrFail($request->input('id'))
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$magazine = Magazine::findOrFail($request->input('id'));

		$magazine->detachFile();

		$magazine->delete();

		return Redirect::back();
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$magazine = Magazine::findOrFail($request->input('id'));

		$magazine->attachFile($request);

		return Redirect::route('admin.magazines.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$magazine = Magazine::findOrFail($request->input('id'));

		$magazine->detachFile();

		return Redirect::back();
	}
}

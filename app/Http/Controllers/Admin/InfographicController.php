<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfographicUpdateRequest;
use App\Http\Requests\UploadSingleImageRequest;
use App\Models\Infographic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class InfographicController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Infographics/Index', [
			'infographics' => fn() => Infographic::with('image')
				->paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		$slug = Str::slug($request->name);

		Infographic::create([
			'title' => $request->title,
			'slug' => $slug,
		]);

		return back();
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Infographics/Edit', [
			'infographic' => fn() => Infographic::where('id', $request->id)
				->with('image')
				->first()
		]);
	}

	public function update(InfographicUpdateRequest $request): RedirectResponse
	{
		Infographic::findOrFail($request->input('id'))
			->update($request->validated());

		return back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		$infographic = Infographic::findOrFail($request->input('id'));

		$infographic->detachImage();

		$infographic->delete();

		return back();
	}

	public function uploadImage(UploadSingleImageRequest $request): RedirectResponse
	{
		$infographic = Infographic::findOrFail($request->input('id'));

		$infographic->attachImage($request);

		return Redirect::route('admin.infographics.edit', $request->input('id'));
	}

	public function deleteImage(Request $request): RedirectResponse
	{
		$infographic = Infographic::findOrFail($request->input('id'));

		$infographic->detachImage();

		return back();
	}
}

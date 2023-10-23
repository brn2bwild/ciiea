<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Requests\UploadImageRequest;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
	public function index(): Response
	{
		return Inertia::render(
			'Admin/Gallery/Index',
			[
				'events' => fn () => Event::select(
					'id',
					'date',
					'name',
				)
					->get()
					->transform(fn ($event) => [
						'id' => $event->id,
						'date' => $event->date,
						'name' => $event->name,
					]),
			]
		);
	}

	public function store(Request $request): RedirectResponse
	{
		Event::create([
			'name' => $request->name,
			'date' => $request->date,
			'slug' => Str::slug($request->name),
		]);

		return back()->with('success','');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Gallery/Edit', [
			'event' => fn () => Event::where('id', $request->id)
				->select(
					'id',
					'name',
					'date',
				)
				->with('images')
				->first()
		]);
	}

	public function update(EventUpdateRequest $request): RedirectResponse
	{
		$validated_data = $request->validate();

		Event::findOrFail($request->id)
			->update($validated_data);

		return back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		//Hace falta manejar la autorización para eliminar registros

		$event = Event::findOrFail($request->input('id'));

		// $event->detachFile();

		$event->delete();

		return to_route('admin.gallery.index');
	}

	public function uploadImages(UploadImageRequest $request): RedirectResponse
	{
		$event = Event::findOrFail($request->id);

		$event->attachImages($request);

		return back();
	}

	public function deleteImages(Request $request): RedirectResponse
	{
		$image = Image::findOrFail($request->id);
		Storage::disk('public')->delete($image->path);

		$image->delete();
		return back();
	}
}

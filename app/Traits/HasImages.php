<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HasImages
{

	public function image(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function images(): MorphMany
	{
		return $this->morphMany(Image::class, 'imageable');
	}

	public function getImages()
	{
		return $this->images()->get();
	}

	public function attachImages(Request $request): void
	{
		foreach ($request->images as $image) {
			$size_bytes = $image->getSize();
			$title = $image->getClientOriginalName();
			$path = Storage::disk('public')->put('gallery/' . $this->slug, $image);

			$newImage = new Image([
				'title' => $title,
				'path' => $path,
				'size_bytes' => $size_bytes,
			]);

			$this->image()->save($newImage);
		}
	}

	public function detachImage(): void
	{
	}
}

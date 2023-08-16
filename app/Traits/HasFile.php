<?php

namespace App\Traits;

use App\Models\File;
use Hamcrest\Type\IsBoolean;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HasFile
{
	//defining polymorph relationship with resources (books, magazines, publications, investigations)
	public function file(): MorphOne
	{
		return $this->morphOne(File::class, 'fileable');
	}

	public function getExistingFile()
	{
		return $this->file()->first();
	}

	public function attachFile(Request $request)
	{
		$current = $this->getExistingFile();

		if ($current) {
			Storage::delete($current->path);
			$current->delete();
		}

		$path = $request->file('file')->store('public/files');
		$size = $request->file('file')->getSize();
		$name = $request->file('file')->getClientOriginalName();

		$newFile = new File([
			'path' => $path,
			'size_bytes' => $size,
			'name' => $name,
		]);

		$this->file()->save($newFile);
	}

	public function detachFile()
	{
		$file = $this->getExistingFile();

		if ($file) {
			Storage::disk("local")->delete($file->path);
			$file->delete();
		}
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'path',
		'size_bytes',
	];

	public function imageable(): MorphTo
	{
		return $this->select('id')->morphTo();
	}
}

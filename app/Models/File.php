<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'path',
		'size_bytes'
	];

	protected $hidden = [
		'fileable_type'
	];

	public function fileable(): MorphTo
	{
		return $this->morphTo();
	}
}

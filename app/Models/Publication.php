<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Publication extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'publicated_at',
	];

	public function file(): MorphOne
	{
		return $this->morphOne(File::class, 'fileable');
	}
}

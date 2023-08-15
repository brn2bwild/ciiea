<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Magazine extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'publication_date',
		'tags',
	];

	public function file(): MorphOne
	{
		return $this->morphOne(File::class, 'fileable');
	}
}

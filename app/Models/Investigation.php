<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Investigation extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'authors',
		'short_description',
		'publication_date',
	];

	public function file(): MorphOne
	{
		return $this->morphOne(File::class, 'fileable');
	}
}

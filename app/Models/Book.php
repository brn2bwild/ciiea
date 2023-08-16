<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Book extends Model
{
	use HasFactory, HasFile;

	protected $fillable = [
		'uuid',
		'title',
		'authors',
		'isbn',
		'publicated_at',
	];

	
}

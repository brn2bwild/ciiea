<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory, HasFile;

	protected $fillable = [
		'title',
		'authors',
		'isbn',
		'publicated_at',
		'slug',
	];
}

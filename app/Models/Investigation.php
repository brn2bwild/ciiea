<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Investigation extends Model
{
	use HasFactory, HasFile;

	protected $fillable = [
		'title',
		'authors',
		'short_description',
		'publicated_at',
	];
}

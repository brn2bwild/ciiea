<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
	use HasFactory, HasImages;

	protected $fillable = [
		'title',
		'slug'
	];
}

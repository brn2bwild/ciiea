<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
	use HasFactory, HasFile;

	protected $fillable = [
		'name',
		'publicated_at',
		'slug',
	];
}

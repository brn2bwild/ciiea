<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	use HasFactory, HasFile;

	protected $fillable = [
		'title',
		'publicated_at',
	];

}

<?php

namespace App\Models;

use App\Traits\HasFile;
use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory, HasFile, HasImages;

		protected $fillable = [
			'name',
			'description',
			'url',
			'slug'
		];
}

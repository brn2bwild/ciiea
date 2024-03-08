<?php

namespace App\Models;

use App\Traits\HasFile;
use App\Traits\HasImages;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
	use HasFactory, HasImages;

	protected $fillable = [
		'name',
		'date',
		'time',
		'location',
		'description',
		'slug'
	];

	// protected $casts = [
	// 	'date' => 'date:Y-m-d',
	// ];

	// Se castea la hora proporcionada al atributo 'time' para que no guarde segundos
	protected function time(): Attribute
	{
		return Attribute::make(
			// set: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
			get: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
		);
	}

	// Se castea la fecha para que tenga el formato adecuado
	protected function date(): Attribute
	{
		return Attribute::make(
			get: fn (string $value) => Carbon::createFromDate($value)->toDateString(),
		);
	}
}

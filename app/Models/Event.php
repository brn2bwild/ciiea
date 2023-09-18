<?php

namespace App\Models;

use App\Traits\HasImages;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use HasFactory, HasImages;

	protected $fillable = [
		'name',
		'date',
	];

	// Se castea la fecha para que tenga el formato adecuado
	protected function date(): Attribute
	{
		return Attribute::make(
			get: fn (string $value) => Carbon::createFromDate($value)->toFormattedDateString(),
		);
	}
}

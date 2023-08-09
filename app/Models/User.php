<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasRoles, HasApiTokens, HasFactory, Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
		'social_media' => 'array',
	];

	public function getMainRole() {
		return $this->getRoleNames()[0];
	}

	// protected function contact_info(): Attribute {
	// 	return Attribute::make(
	// 		get: fn ($value) => json_decode($value, true),
	// 		set: fn ($value) => json_encode($value),
	// 	);
	// }
}

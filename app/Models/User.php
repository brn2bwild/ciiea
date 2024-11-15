<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\PasswordReset;
use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasRoles, HasApiTokens, HasFactory, Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
		'social_media',
		'mobile',
		'short_description',
		'long_description',
		'is_admin_contact',
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

	public function getMainRole(): String
	{
		return $this->getRoleNames()[0];
	}

	public function image(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function getCurrentProfileImage(): Image|null
	{
		return ($this->image()->first()) ?? null;
	}

	public function setProfileImage(Request $request): void
	{
		$currentImage = $this->getCurrentProfileImage();

		if ($currentImage) {
			Storage::delete($currentImage->path);
			$currentImage->delete();
		}

		$size_bytes = $request->image->getSize();

		// $name = 'profile-avatar-' . uniqid() . '.' . $request->image->getClientOriginalExtension();

		$path = Storage::disk('local')->put('profile_images', $request->image);

		$name = substr($path, 15);

		$newImage = new Image([
			'name' => $name,
			'path' => $path,
			'size_bytes' => $size_bytes,
		]);

		$this->image()->save($newImage);
	}

	public function sendPasswordResetNotification($token)
	{
		$this->notify(new PasswordReset($token));
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('mobile')->nullable();
			$table->boolean('enabled')->default(true);
			$table->string('short_description')
				->max(30)
				->nullable();
			$table->string('long_description')
				->max(300)
				->nullable();
			$table->json('social_media')->nullable();
			$table->rememberToken();
			$table->timestamp('last_login')->nullable();
			$table->boolean('is_admin_contact')->default(false);
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('users');
	}
};

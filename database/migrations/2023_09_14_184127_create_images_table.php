<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('images', function (Blueprint $table) {
			$table->id();
			$table->uuid('identifier')
				->default(Str::uuid());
			$table->morphs('imageable');
			$table->string('name');
			$table->string('path');
			$table->string('size_bytes');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('images');
	}
};

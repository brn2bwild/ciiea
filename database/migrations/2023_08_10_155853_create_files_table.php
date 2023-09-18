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
		Schema::create('files', function (Blueprint $table) {
			$table->id();
			$table->uuid('uuid')
				->default(Str::uuid());
			$table->morphs('fileable');
			$table->string('name');
			$table->string('path');
			$table->integer('size_bytes');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('files');
	}
};

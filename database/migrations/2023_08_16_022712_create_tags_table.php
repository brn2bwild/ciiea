<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		// table for tags that will be used for froup resources
		Schema::create('tags', function (Blueprint $table) {
			$table->id();
			$table->string('name');
		});

		// id of the tag, foreign key to tags table.
		Schema::create('taggables', function (Blueprint $table){
			$table->id();
			$table->morphs('taggable');
		});
	}

	public function down(): void
	{
		// drops the tables created
		Schema::dropIfExists('tags');
		Schema::dropIfExists('taggables');
	}
};

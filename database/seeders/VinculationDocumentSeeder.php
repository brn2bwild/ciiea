<?php

namespace Database\Seeders;

use App\Models\VinculationDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VinculationDocumentSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		VinculationDocument::factory(5)->create();
	}
}

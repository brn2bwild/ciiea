<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Magazine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		// \App\Models\User::factory(10)->create();

		// \App\Models\User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);

		//Ejecutamos los seeders para poblar la BD
		$this->call([
			PermissionsSeeer::class,
			BookSeeder::class,
			MagazineSeeder::class,
			PublicationSeeder::class,
			InvestigationSeeder::class,
			ConvocationSeeder::class,
			EventSeeder::class,
			SoftwareSeeder::class,
			InfographicSeeder::class,
			ResourceSeeder::class,
		]);
	}
}

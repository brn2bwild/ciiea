<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
	return Inertia::render('Home', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
		'laravelVersion' => Application::VERSION,
		'phpVersion' => PHP_VERSION,
	]);
})->name('home');

Route::get('/divulgation', function () {
	return Inertia::render('Divulgation', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
	]);
})->name('divulgation');

Route::get('/convocations', function () {
	return Inertia::render('Convocations', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
	]);
})->name('convocations.index');

Route::get('/gallery', function () {
	return Inertia::render('Gallery', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
	]);
})->name('gallery');

Route::get('/reime', function () {
	return Inertia::render('Reime', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
	]);
})->name('reime');

Route::get('/contact', function () {
	return Inertia::render('Contact', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
		'users' => [
			[
				'name' => 'daniel'
			],
			[
				'name' => 'Carlos'
			]
		]
	]);
})->name('contact');

Route::get('/dashboard', function () {
	return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])
	->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])
	->prefix('admin')
	->group(function () {
		Route::get('/dashboard', function () {
			return Inertia::render('Admin/Dashboard');
		})->name('admin.dashboard');

		Route::get('/divulgation', function () {
			return Inertia::render('Admin/Divulgation');
		})->name('admin.divulgation');

		Route::get('/gallery', function () {
			return Inertia::render('Admin/Gallery');
		})->name('admin.gallery');

		Route::get('/contact', function () {
			return Inertia::render('Admin/Contact', [
				'users' => [
					[
						'name' => 'danie',
						'position' => 'director general',
						'celular_number' => '9321123242',
						'email' => 'admin@example.com',
						'twitter' => '@dir_ciiea',
					],
					[
						'name' => 'carlos',
						'position' => 'sistemas',
						'celular_number' => '9321132242',
						'email' => 'sistemas@example.com',
						'twitter' => '@sistemas_ciiea',
					]
				]
			]);
		})->name('admin.contact');
	});

Route::middleware(['auth', 'verified', 'role:admin'])
	->prefix('admin')
	->group(function () {
		Route::post('/contact', [ContactController::class, 'update'])
			->name('admin.contact.update');
	});

require __DIR__ . '/auth.php';

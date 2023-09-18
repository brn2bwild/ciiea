<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ConvocationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InvestigationController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use App\Models\Convocation;
use App\Models\Event;
use App\Models\Investigation;
use App\Models\Magazine;
use App\Models\Publication;
use App\Models\User;
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

Route::get('/files/{file}', [FileController::class, 'show'])->name('file.show');

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
			$admin_users = User::with('roles')->get()->filter(
				fn ($user) => $user->roles->where('name', 'admin')->toArray()
			)->count();

			$users = User::with('roles')->get()->filter(
				fn ($user) => $user->roles->whereNotIn('name', 'admin')->toArray()
			)->count();

			return Inertia::render('Admin/Dashboard', [
				'books' => Book::get()->count(),
				'magazines' => Magazine::get()->count(),
				'publications' => Publication::get()->count(),
				'investigations' => Investigation::get()->count(),
				'convocations' => Convocation::get()->count(),
				'gallery' => Event::get()->count(),
				'admin_users' => $admin_users,
				'users' => $users
			]);
		})->name('admin.dashboard');

		Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
		Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
		Route::patch('/books', [BookController::class, 'update'])->name('admin.books.update');
		Route::delete('/books', [BookController::class, 'destroy'])->name('admin.books.destroy');
		Route::post('/books/file', [BookController::class, 'uploadFile'])->name('admin.books.upload-file');
		Route::delete('/book/file', [BookController::class, 'deleteFile'])->name('admin.books.delete-file');

		Route::get('/magazines', [MagazineController::class, 'index'])->name('admin.magazines.index');
		Route::get('/magazines/{id}/edit', [MagazineController::class, 'edit'])->name('admin.magazines.edit');
		Route::patch('/magazines', [MagazineController::class, 'update'])->name('admin.magazines.update');
		Route::delete('/magazines', [MagazineController::class, 'destroy'])->name('admin.magazines.destroy');
		Route::post('/magazines/file', [MagazineController::class, 'uploadFile'])->name('admin.magazines.upload-file');
		Route::delete('/magazines/file', [MagazineController::class, 'deleteFile'])->name('admin.magazines.delete-file');

		Route::get('/historical-publications', [PublicationController::class, 'index'])->name('admin.historical-publications.index');
		Route::get('/historical-publications/{id}/edit', [PublicationController::class, 'edit'])->name('admin.historical-publications.edit');
		Route::patch('/historical-publications', [PublicationController::class, 'update'])->name('admin.historical-publications.update');
		Route::delete('/historical-publications', [PublicationController::class, 'destroy'])->name('admin.historical-publications.destroy');
		Route::post('/historical-publications/file', [PublicationController::class, 'uploadFile'])->name('admin.historical-publications.upload-file');
		Route::delete('/historical-publications/file', [PublicationController::class, 'deleteFile'])->name('admin.historical-publications.delete-file');

		Route::get('/investigations', [InvestigationController::class, 'index'])->name('admin.investigations.index');
		Route::get('/investigations/{id}/edit', [InvestigationController::class, 'edit'])->name('admin.investigations.edit');
		Route::patch('/investigations', [InvestigationController::class, 'update'])->name('admin.investigations.update');
		Route::delete('/investigations', [InvestigationController::class, 'destroy'])->name('admin.investigations.destroy');
		Route::post('/investigations/file', [InvestigationController::class, 'uploadFile'])->name('admin.investigations.upload-file');
		Route::delete('/investigations/file', [InvestigationController::class, 'deleteFile'])->name('admin.investigations.delete-file');

		Route::get('/convocations', [ConvocationController::class, 'index'])->name('admin.convocations.index');
		Route::get('/convocations/{id}/edit', [ConvocationController::class, 'edit'])->name('admin.convocations.edit');
		Route::patch('/convocations', [ConvocationController::class, 'update'])->name('admin.convocations.update');
		Route::delete('/convocations', [ConvocationController::class, 'destroy'])->name('admin.convocations.destroy');
		Route::post('/convocations/file', [ConvocationController::class, 'uploadFile'])->name('admin.convocations.upload-file');
		Route::delete('/convocations/file', [ConvocationController::class, 'deleteFile'])->name('admin.convocations.delete-file');

		Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
		Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
		Route::delete('/gallery', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
		Route::post('/gallery/images', [GalleryController::class, 'uploadImages'])->name('admin.gallery.upload-images');
		Route::delete('/gallery/images', [GalleryController::class, 'deleteImages'])->name('admin.gallery.delete-images');

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
		Route::post('/contact', [ContactController::class, 'update'])
			->name('admin.contact.update');
	});

require __DIR__ . '/auth.php';

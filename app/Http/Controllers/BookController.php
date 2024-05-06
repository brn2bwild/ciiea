<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Divulgation/Books/Index', [
			'canLogin' => Route::has('login'),
			'canRegister' => Route::has('register'),
			'books' => Book::with('file')
				->select('id', 'title', 'authors', 'isbn', 'publicated_at', 'slug')
				->get()
				->each(function ($book, $index) {
					$book->publicated_at = Carbon::createFromDate($book->publicated_at)->isoFormat('LL');
				})
				->toArray(),
		]);
	}
}

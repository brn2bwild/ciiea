<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BooksCollection;
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
			'books' => BookResource::collection(Book::paginate(6))
		]);
	}
}

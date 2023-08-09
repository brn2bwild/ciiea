<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Books/Index', [
			'books' => Book::select('uuid', 'title', 'authors', 'isbn', 'publication_date')->get()->toArray(),
		]);
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Books/Edit', [
			'book' => Book::select('uuid', 'title', 'authors', 'isbn', 'publication_date')->where('uuid', $request->uuid)->first()->toArray(),
		]);
	}

	public function update(BookUpdateRequest $request): RedirectResponse
	{
		Book::where('uuid', $request->uuid)
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request)
	{
		//Hace falta manejar la autorización para eliminar registros
		
		Book::where('uuid', $request->uuid)
			->delete();

		return Redirect::route('admin.books.index');
	}
}

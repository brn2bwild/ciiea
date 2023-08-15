<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Book;
use App\Models\File;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;


class BookController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Books/Index', [
			'books' => fn () => Book::select(
				'id',
				'title',
				'authors',
				'isbn',
				'publication_date',
			)
				->get()
				->toArray(),
		]);
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Books/Edit', [
			'book' => fn () => Book::where('id', $request->id)
				->select(
					'id',
					'title',
					'authors',
					'isbn',
					'publication_date',
				)
				->with('file')
				->first()
		]);
	}

	public function update(BookUpdateRequest $request): RedirectResponse
	{
		Book::findOrFail($request->input('id'))
			->update($request->validated());

		return Redirect::back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		//Hace falta manejar la autorización para eliminar registros

		Book::where('uuid', $request->uuid)
			->delete();

		return Redirect::route('admin.books.index');
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$request->validated();

		$book = Book::findOrFail($request->input('id'));
		
		if ($book->file != null) {
			$file = $book->file()->first();

			Storage::delete($file->path);

			$file->delete();
		}

		$path = $request->file('file')->store('public/files');
		$size = $request->file('file')->getSize();
		$name = $request->file('file')->getClientOriginalName();

		$file = new File([
			'path' => $path,
			'size_bytes' => $size,
			'name' => $name,
		]);

		$book->file()->save($file);


		return Redirect::route('admin.books.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		if (Storage::exists($request->input('file.path'))) {
			Storage::disk("local")->delete($request->input('file.path'));
			File::where('id', $request->input('file.id'))->delete();

			return Redirect::back();
		}
	}
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
	public function authorize(): bool
	{
		//Verificamos mediante el usuario que hizo la petición si tiene el rol de admin
		return ($this->user()->getMainRole() === 'admin');
	}

	public function rules(): array
	{
		return [
			'id' => ['required', 'exists:books,id'],
			'title' => ['required', 'string', 'max:255',],
			'authors' => ['required', 'string', 'max:255'],
			'isbn' => ['required', 'string', 'max:255'],
			'publicated_at' => ['required', 'date']
		];
	}
}

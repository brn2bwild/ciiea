<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class infographicUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return ($this->user()->getMainRole() == 'admin');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'id' => ['required', 'exists:infographics,id'],
			'title' => ['required', 'string', 'max:255'],
		];
	}
}

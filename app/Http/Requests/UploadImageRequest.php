<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'id' => ['required', 'numeric'],
			'images' => ['required'],
			'images.*' => ['required', 'mimes:png,jpg,jpeg', 'max:5120']
		];
	}
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadSingleImageRequest extends FormRequest
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
			'id' => ['required', 'numeric'],
			'image' => ['required', 'mimes:png,jpg,jpeg', 'max:2048'],
			// 'images.*' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
		];
	}
}

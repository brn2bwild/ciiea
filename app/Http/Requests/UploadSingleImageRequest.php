<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadSingleImageRequest extends FormRequest
{
	public function authorize(): bool
	{
		return ($this->user()->getMainRole() == 'admin');
	}


	public function rules(): array
	{
		return [
			'id' => ['required', 'numeric'],
			'image' => ['required', 'mimes:png,jpg,jpeg', 'max:5120'],
			// 'images.*' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
		];
	}
}

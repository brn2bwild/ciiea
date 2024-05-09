<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationUpdateRequest extends FormRequest
{
	public function authorize(): bool
	{
		return ($this->user()->getMainRole() == 'admin');
	}

	public function rules(): array
	{
		return [
			'id' => ['required', 'exists:investigations,id'],
			'title' => ['required', 'string', 'max:255'],
			'authors' => ['required', 'string', 'max:255'],
			'short_description' => ['required', 'string', 'max:255'],
			'publicated_at' => ['required', 'date']
		];
	}
}

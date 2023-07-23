<?php

namespace App\Interfaces\Http\Request\Consumer;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
	public function rules()
	{
		return [
			'name' => ['required', 'max:255'],
		];
	}
}
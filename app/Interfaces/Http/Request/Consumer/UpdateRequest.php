<?php

namespace App\Interfaces\Http\Request\Consumer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
	public function all($keys = null)
	{
		$data = parent::all();
		$data['id'] = $this->route('id');
		return $data;
	}

	public function rules()
	{
		return [
			'id' => ['required', 'integer'],
			'name' => ['required', 'max:255'],
		];
	}
}
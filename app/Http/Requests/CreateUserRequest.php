<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        ray($this->isMethod('post'));
        switch ($this->method()) {
            case 'GET':
                return [];
            case 'POST':
                return [
                    'data' => 'array|required',
                    'data.title' => 'string|required',
                    'data.meta' => 'array',
                    'data.meta.tags' => 'array',
                    'data.meta.tags.*' => 'string',
                ];
        }
    }

    public function bodyParameters()
    {
        return [];
    }
}

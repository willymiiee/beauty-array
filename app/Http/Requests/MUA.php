<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MUA extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'name'  => 'required',
                'email' => 'required|email'
            ];
        } else {
            return [
                'name'  => 'sometimes',
                'email' => 'sometimes',
                'slug' => 'sometimes'
            ];
        }
    }

    public function response(array $errors)
    {
        return response()->json([
            'errors'  => $errors
        ], 422);
    }
}
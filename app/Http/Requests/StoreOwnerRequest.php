<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOwnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'carte_nationale' => 'required|string|max:50|unique:owner_requests,carte_nationale',
            'cin_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'other_info' => 'nullable|string',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && in_array($this->user()->role, ['owner', 'admin']);
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|array',
            'title.fr' => 'sometimes|string|max:255',
            'title.ar' => 'nullable|string|max:255',
            'description' => 'sometimes|array',
            'description.fr' => 'sometimes|string',
            'description.ar' => 'nullable|string',
            'city' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'property_type' => 'sometimes|string|max:100',
            'contract_type' => 'sometimes|in:rent,sale',
            'bedrooms' => 'sometimes|integer|min:0',
            'bathrooms' => 'sometimes|integer|min:0',
            'amenities' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'starting_price' => 'sometimes|numeric|min:0',
            'min_bid_increment' => 'sometimes|numeric|min:1',
            'expires_at' => 'sometimes|date|after:now',
        ];
    }
}
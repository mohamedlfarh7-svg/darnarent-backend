<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && in_array($this->user()->role, ['owner', 'admin']);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|array',
            'title.fr' => 'required|string|max:255',
            'title.ar' => 'nullable|string|max:255',
            'description' => 'required|array',
            'description.fr' => 'required|string',
            'description.ar' => 'nullable|string',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'property_type' => 'required|string|max:100',
            'contract_type' => 'required|in:rent,sale',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'amenities' => 'nullable|array',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'starting_price' => 'required|numeric|min:0',
            'min_bid_increment' => 'required|numeric|min:1',
            'expires_at' => 'required|date|after:now',
        ];
    }
}
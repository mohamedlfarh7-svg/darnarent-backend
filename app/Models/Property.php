<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'city',
        'address',
        'property_type',
        'contract_type',
        'bedrooms',
        'bathrooms',
        'amenities',
        'images',
        'starting_price',
        'current_bid',
        'min_bid_increment',
        'is_approved',
        'status',
        'expires_at',
        'winner_id',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'amenities' => 'array',
        'images' => 'array',
        'is_approved' => 'boolean',
        'starting_price' => 'decimal:2',
        'current_bid' => 'decimal:2',
        'min_bid_increment' => 'decimal:2',
        'expires_at' => 'datetime',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
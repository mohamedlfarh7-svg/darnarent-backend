<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'prenom',
        'age',
        'carte_nationale',
        'cin_photo',
        'profile_photo',
        'other_info',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
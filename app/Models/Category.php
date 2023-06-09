<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'name',
        'tag',
        'status',
    ];
}

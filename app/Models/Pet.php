<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PetImage;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'size',
        'breed',
        'gender',
        'child',
        'cats',
        'other_boys',
        'other_girls',
        'birds',
        'stealing',
        'demolition',
        'activity',
        'temperament',
        'city',
        'commands',
        'loyal',
        'alone',
        'status',
        'category_id'
    ];
    
    public function petImage()
    {
        return $this->hasMany(PetImage::class, 'pet_id', 'id');
    }
    
}

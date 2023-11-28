<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // получение данных из бд
    protected $fillable = [
        "title",
    ];

    public function course(){
        return $this->hasMany(Course::class);
    }
}

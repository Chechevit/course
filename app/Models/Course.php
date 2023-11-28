<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // получение данных из бд
    protected $fillable = [
        "title",
        "description",
        "duration",
        "cost",
        "image",
        "category_id",
    ];
}

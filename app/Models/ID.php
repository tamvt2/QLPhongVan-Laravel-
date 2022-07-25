<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ID extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'category_id'
    ];
}

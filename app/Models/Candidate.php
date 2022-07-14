<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'phone',
        'address',
        'category_id',
        'experince',
        'interview_date'
    ];
}

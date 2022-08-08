<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setups extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id'
    ];

    public $timestamps = false;
}

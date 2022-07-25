<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_id_in_setup extends Model
{
    use HasFactory;

    protected $fillable = [
        'setup_id',
        'i_d_s_id'
    ];
}

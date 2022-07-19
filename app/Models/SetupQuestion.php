<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'interview_id',
        'candidate_id',
        'question_id_1',
        'question_id_2',
        'question_id_3',
        'question_id_4',
        'question_id_5',
        'question_id_6',
        'question_id_7',
        'question_id_8',
        'question_id_9',
        'question_id_10'
    ];
}

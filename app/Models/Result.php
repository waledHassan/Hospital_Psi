<?php

namespace App\Models;

use App\Http\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;


    protected $table = 'results';
    protected $fillable = [
        'test_id',
        'doctor_id',
        'patient_id',
        'question_id',
        'answer_id',
        'answer_status',
        'answer_date',
        'level'
    ];
}

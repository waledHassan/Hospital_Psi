<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestHistory extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = [
        'company_id',
        'patient_id',
        'doctor_id',
        'level_id',
        'ear_side',
        'test_date',
        'start_time',
        'end_time',
        'total_questions',
        'total_answers',
        'percentage'
    ];
}

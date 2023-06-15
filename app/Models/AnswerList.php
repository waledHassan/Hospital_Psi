<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AnswerList extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'type',
        'answer',
        'correct_answer',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    protected function answer(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset("upload/answer/$value")
        );
    }
}

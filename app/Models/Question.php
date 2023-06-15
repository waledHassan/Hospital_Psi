<?php

namespace App\Models;

use App\Http\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Question extends Model
{


    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'name',
        'audio',
        'timing',
        'order_no',
        'level_id',
        'status',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    protected function audio(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset("upload/question/$value")
        );
    }


    public function answers()
    {
        return $this->hasMany(AnswerList::class);
    }
}

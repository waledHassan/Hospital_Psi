<?php

namespace App\Models;

use App\Http\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{


    use HasFactory;
    protected $table = 'levels';

    protected $fillable = [
        'name',
        'description',
        'image_name',
        'status',
        'category_id',
        'order',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageNameAttribute($value)
    {
        return asset("upload/level/$value");
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

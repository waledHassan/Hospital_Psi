<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'status',
        'name',
        'img1',
        'img2',
        'imgvaf',
        'address',
        'mobile',
        'email',
        'currency',
        'facbook',
        'twitter',
        'google_plus',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'header_script',
        'footer_script',
        'default_language',
    ];


    protected function img1(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset("upload/company/$value")
        );
    }
    protected function img2(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset("upload/company/$value")
        );
    }
    protected function imgvaf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset("upload/company/$value")
        );
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Admin extends Authenticatable
{

    use HasFactory;
    protected $table = 'admins';
    public $guard_name = 'admin';

    protected $fillable = [
        'username',
        'email',
        'fname',
        'lname',
        'email',
        'address',
        'title',
        'active',
        'mobile_no',
        'city_id',
        'country_id',
        'postal_code',
        'password',
        'company_id',
        'admingroup_id',
    ];
    protected $hidden = [
        'password',
    ];

    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(' ', '', $value)
        );
    }

    public function admingroup()
    {
        return $this->belongsTo(Admingroup::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

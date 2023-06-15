<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $table = 'doctors';

    protected $fillable = [
        'company_id',
        'members_no',
        'first_name',
        'second_name',
        'last_name',
        'email',
        'mobile_no',
        'password',
        'activate_code',
        'password_code',
        'dob',
        'gender',
        'profile_image',
        'status',
        'last_otp',
        'last_visit',
        'register_date',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->second_name . ' ' . $this->last_name;
    }
}

<?php

namespace App\Models;

use App\Http\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{    

    use HasFactory;
    protected $table = 'patients';

    protected $fillable = [
        'company_id',
        'medical_no',
        'members_no',
        'first_name',
        'last_name',
        'second_name',
        'email',
        'mobile_no',
        'dob',
        'gender',
        'country_id',
        'city_id',
        'left_normal_hear',
        'left_hearing_device',
        'left_implant_date',
        'right_normal_hear',
        'right_hearing_device',
        'right_implant_date',
        'status',
        'register_date',
    ];
}

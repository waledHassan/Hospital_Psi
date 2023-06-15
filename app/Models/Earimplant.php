<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earimplant extends Model
{
    use HasFactory;
    protected $table = 'earimplant';

    protected $fillable = [
        'patient_id',
        'l_normal_hear',
        'l_hear_loss',
        'left_hearing_device',
        'l_implant_date',
        'r_normal_hear',
        'r_hear_loss',
        'right_hearing_device',
        'r_implant_date',
        'l_no_device',
        'r_no_device',
        'l_hear_aid',
        'r_hear_aid',
        'l_hear_imp_system',
        'r_hear_imp_system',
        'l_cochlear_implant',
        'r_cochlear_implant',
        'l_cochlear_implant_ear',
        'r_cochlear_implant_ear',
        'l_middle_ear',
        'r_middle_ear',
        'l_bone_implant',
        'r_bone_implant',
        'l_brain_implant',
        'r_brain_implant',
        'l_hybrid_system',
        'r_hybrid_system',
        'l_adhesive_bone',
        'r_adhesive_bone',
    ];
}

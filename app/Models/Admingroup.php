<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admingroup extends Model
{
    use HasFactory;
    protected $table = 'admingroups';

    protected $fillable = [
        'company_id',
        'name',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Adminrole::class)->withPivot('status');
    }
}

<?php

namespace App\Services;

use App\Models\Admingroup;

class PerService
{

    public function getPermissions()
    {
        return (auth()->user()->admingroup->permissions()->where('admingroup_adminrole.status','=','1')->pluck('name')->toArray());
    }
}

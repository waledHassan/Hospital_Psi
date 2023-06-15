<?php

namespace App\Http\Traits;

use App\Scopes\CompanyScope;
use App\Models\Admin;
trait HasCompanyScope
{
    protected static function boot()
    {
        // dd(\Auth::user());

        // if (\Auth::guard('admin')->check()) {
        //     parent::boot();
        //     static::addGlobalScope(new CompanyScope());
        // }
    }
}

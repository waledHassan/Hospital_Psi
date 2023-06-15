<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function cities(Request $request)
    {
        $data = City::whereHas("country", function ($q) use ($request) {
            if ($request->govern_id) {
                $q->where('id', $request->govern_id);
            }
        })->get();
        return response()->json($data);
    }
}

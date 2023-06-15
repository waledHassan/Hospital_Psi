<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public static function responseJson($status, $massage, $data = null, $attr = null)
    {
        if ($data == null) {
            $response =
                [
                    'status' => (int) $status,
                    'massage' => $massage,
                ];
        } else {
            $response =
                [
                    'status' => (int) $status,
                    'massage' => $massage,
                ];
            if (is_array($attr)) {
                foreach ($attr as $key => $value) {
                    $response[$key] = $value;
                }
            }
            $response['data'] = $data;
        }

        return response()->json($response);
    }

    public static function responseJsonNew($draw, $recordsTotal, $recordsFiltered, $data = null)
    {
        if ($data == null) {
            return 'stop';
        } else {
            $response = [
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data,
            ];
        }

        return response()->json($response);
    }
}

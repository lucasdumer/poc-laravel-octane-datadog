<?php

namespace App\Interfaces\Http\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'status'=> 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

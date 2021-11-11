<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * API response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function response($data = null, $message = 'Action performed successfully', $status = 200)
    {
    	$response = [
            'status' => $status == 200 ? 'success' : 'error',
            'message' => $message,
            'data'    => $data,
        ];

        return response()->json($response, $status);
    }
}

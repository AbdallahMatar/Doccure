<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerHelper extends Controller
{
    //
    public static function generateResponse($status, $message)
    {
        return response()->json([
           'status' => $status,
           'message' => $message
        ]);
    }
}

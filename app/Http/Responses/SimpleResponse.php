<?php

namespace App\Http\Responses;

class SimpleResponse {
    /**
     * 
     */
    public static function error($errors, $code = 400){
        return response()->json([
            'errors' => $errors
        ], $code);
    }

    public static function success($success, $code = 200) {
        return response()->json([
            'success' => $success
        ], $code);
    }

    public static function data($data, $code = 200) {
        return response()->json([
            'data' => $data
        ], $code);  
    }
}
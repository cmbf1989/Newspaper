<?php
namespace App\Http\Controllers;

abstract class AppController extends Controller
{
    
    public function successResponse(Array $data = [], Int $httpCode = 200) : Object
    {
        $response = [
            'version' => env('APP_VERSION', 'unknown'),
            'datetime' => date('Y-m-d h:m:s'),
            'success' => true,
            'data' => $data
        ];
        return response()->json($response, $httpCode);        
    }

    public function errorsResponse(Array $data, Int $httpCode = 400) : Object
    {
        $response = [
            'version' => env('APP_VERSION', 'unknown'),
            'datetime' => date('Y-m-d h:m:s'),
            'success' => false,
            'errors' => $data
        ];
        return response()->json($response, $httpCode);
    }

    public function errorResponse(String $code = ApiResponseCodes::GENERIC, String $message = '', Int $httpCode = 400)  : Object
    {
        $response = [
            'version' => env('APP_VERSION', '1.0'),
            'datetime' => date('Y-m-d h:m:s'),
            'success' => false,
            'errors' => [[
                'code' => $code,
                'message' => $message
            ]]
        ];
        return response()->json($response, $httpCode);
    }
}
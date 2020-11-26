<?php

/**
 * return data to client
 *
 * @param $status
 * @param $message
 * @param array $data
 * @param int $httpCode
 * @return \Illuminate\Http\JsonResponse
 */
function jsonResponse($status, $message, $data = [], $httpCode=200)
{
    $arr = [
        'status' => $status,
        'message' => $message
    ];
    if (! empty($data)) {
        $arr['data'] = $data;
    }
    return response()->json($arr, $httpCode);
}
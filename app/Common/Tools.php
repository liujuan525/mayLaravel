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

/**
 * 验证
 * @param array $data
 * @param array $rules 规则
 * @param array $messages 报错信息
 * @param array $attributes 变量信息
 * @return string/boolean
 */
function checkValidate($data, $rules, $messages, $attributes)
{
    $validator = Validator::make($data, $rules, $messages, $attributes);
    if ($validator->fails()) {
        // 返回错误信息
        $messages = $validator->messages();

        if (count($messages) != 0) {
            return $validator->errors()->first();
        }
    }
    return true;
}
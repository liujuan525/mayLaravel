<?php

/** 发送短信测试 php artisan tinker */
$sms = app('easysms');
try {
    $sms->send(15810754562, [
        'template' => 'SMS_205887628',
        'data' => [
            'code' => 1234
        ],
    ]);
} catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
    $message = $exception->getException('aliyun')->getMessage();
    dd($message);
}
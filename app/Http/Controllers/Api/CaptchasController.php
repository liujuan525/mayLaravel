<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Str;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-' . Str::random(15);
        $phone = $request->phone;
        // build() 创建图片验证码
        $captcha = $captchaBuilder->build();
        $expireAt = now()->addMinutes(2);
        // getPhrase() 获取验证码文本
        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expireAt);

        $result = [
            'captcha_key' => $key,
            'expired_at'  => $expireAt->toDateTimeString(),
            // inline() 获取 base64 的图片验证码
            'captcha_image_content' => $captcha->inline()
        ];
        return response()->json($result)->setStatusCode(201);
    }
}

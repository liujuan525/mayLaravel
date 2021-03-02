<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
            abort(403, '验证码已失效');
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            throw new AuthenticationException('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        return (new UserResource($user))->showSensitiveFields();
    }

    // 获取某一个用户信息
    public function show(User $user, Request $request)
    {
        return new UserResource($user);
    }

    // 获取当前用户信息
    public function me(Request $request)
    {
        return (new UserResource($request->user()))->showSensitiveFields();
    }

    // 编辑用户信息
    public function update(UserRequest $request)
    {
        $user = $request->user();
        $attributes = $request->only(['name', 'email', 'introduction']);
        if ($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);
            $attributes['avatar'] = $image->path;
        }
        $user->update($attributes);

        return (new UserResource($user))->showSensitiveFields();
    }

}

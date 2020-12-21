<?php

namespace App\Http\Controllers\Api;

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class QueueController extends Controller
{
    const TOTAL_CACHE_KEY = 'total_price';                      // 总可抢购金额 key
    const TOTAL_CACULATE_CACHE_KEY = 'total_caculate_price';    // 总可抢购金额 key, 用于计算
    const RECEIVE_TOTAL_CACHE_KEY = 'receive_price';            // 已抢购的金额 key

    public function __construct($total = 5000)
    {
        // 设置可抢购的总余额
        if (! Cache::has(self::TOTAL_CACHE_KEY)) {
            Cache::set(self::TOTAL_CACHE_KEY, $total, 60 * 10);
            Cache::set(self::TOTAL_CACULATE_CACHE_KEY, $total, 60 * 10);
        }
    }

    public function index(Request $request)
    {
        // 总 可抢购金额
        $total_price = Cache::get(self::TOTAL_CACHE_KEY);
        // 已经抢到的金额总数
        $receive_total_price = Cache::get(self::RECEIVE_TOTAL_CACHE_KEY, 0);
        // 当前请求的用户
        $name = $request->get('name', "hui");
        // 当前请求的用户抢的金额
        $receive_user_price = $request->get('receive_user_price', 100);

        dispatch(new TestJob($name, $receive_user_price))->onQueue("podcasts");

        return response()->json(["code" => 200, "message" => "ok"]);
    }
}
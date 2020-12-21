<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const TOTAL_CACULATE_CACHE_KEY = 'total_caculate_price';    // 总可抢购金额 key
    const LOCK_CACHE_KEY = 'lock';

    protected $name;
    protected $receive_user_price;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $receive_user_price)
    {
        $this->name = $name;
        $this->receive_user_price = $receive_user_price;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $total_caculate_price = Cache::get(self::TOTAL_CACULATE_CACHE_KEY, 0);
//        if ($total_caculate_price - $this->receive_user_price >= 0) {
//            Cache::set(self::TOTAL_CACULATE_CACHE_KEY, $total_caculate_price - $this->receive_user_price, 60 * 60);
//            Log::info(sprintf("队列处理: 用户 %s 抢到了, 金额为: %d, 剩余金额为: %d ", $this->name, $this->receive_user_price, $total_caculate_price - $this->receive_user_price));
//        } else {
//            throw new \Exception("队列处理失败: 超出金额限制, 当前请求金额: " . $this->receive_user_price . " 总剩余金额: " . $total_caculate_price);
//        }
        Log::info("queue test", [$this->receive_user_price, $this->name]);

    }

    public function fail($exception)
    {
        Log::info("队列处理错误: " . $exception->getMessage());
    }

}

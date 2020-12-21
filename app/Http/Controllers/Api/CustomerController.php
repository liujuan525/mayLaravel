<?php

namespace App\Http\Controllers\Api;

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        for($i = 0; $i < 10; $i++) {
            TestJob::dispatch($request->get('name'), $i)->onQueue("podcasts")->delay(now()->addMinutes(5));
        }

        return $request->get('name') . PHP_EOL;
    }
}

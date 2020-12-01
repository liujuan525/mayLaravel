<?php

namespace App\Http\Controllers\Api;

use App\Jobs\TestJob;
use App\Model\Api\Customer;
use App\Validates\Api\CustomersValidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{
    public function index(Request $request, Customer $customer, CustomersValidate $validate)
    {
        for($i = 0; $i < 10; $i++) {
            dispatch(new TestJob($request->get('name') . $i))->onQueue("podcasts");
        }

        return $request->get('name') . PHP_EOL;
    }
}

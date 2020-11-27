<?php

namespace App\Http\Controllers\Api;

use App\Validates\Api\CustomersValidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Api\Customer;

class CustomerController extends Controller
{
    public function index(Request $request, Customer $customer, CustomersValidate $validate)
    {
        $data = $request->only('customer_id');

        $validateResult = $validate->checkCustomerId($data);
        if ($validateResult !== true) {
            jsonResponse(false, 'failed');
        }

        $customerInfo = $customer->getCustomerInfo($data['customer_id']);
        jsonResponse(true, 'success', $customerInfo);
    }
}

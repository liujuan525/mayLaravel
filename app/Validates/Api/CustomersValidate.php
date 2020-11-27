<?php

namespace App\Validates\Api;

class CustomersValidate
{
    private $customer_id_rule = [
        'id' => 'required|integer'
    ];

    private $messages = [
        'required' => ":attribute 不能为空",
        'integer' => ":attribute 格式错误"
    ];

    private $attributes = [
        'id' => '必要参数'
    ];

    /**
     * check customer id
     * @param $data
     * @return bool
     */
    public function checkCustomerId($data)
    {
        return checkValidate($data, $this->customer_id_rule, $this->messages, $this->attributes);
    }

}
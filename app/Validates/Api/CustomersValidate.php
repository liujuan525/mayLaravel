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
     * validator method
     * @param $data
     * @param $rules
     * @param $messages
     * @param $attributes
     * @return bool
     */
    function checkValidate($data, $rules, $messages, $attributes)
    {
        $validator = Validator::make($data, $rules, $messages, $attributes);
        if ($validator->fails()) {
            $messages = $validator->messages();

            if (count($messages) != 0) {
                return $validator->errors()->first();
            }
        }
        return true;
    }

    /**
     * check customer id
     * @param $data
     * @return bool
     */
    public function checkCustomerId($data)
    {
        return $this->checkValidate($data, $this->customer_id_rule, $this->messages, $this->attributes);
    }

}
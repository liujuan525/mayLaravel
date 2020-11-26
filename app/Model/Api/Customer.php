<?php

namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $hidden = [
        'password'
    ];

    protected $table = 'customers';

    // 禁止数据自动维护（updated_at）
    public $timestamps = false;

    /**
     * get user info
     * @param $customerId
     * @return array
     */
    public function getCustomerInfo($customerId)
    {
        return DB::table($this->table)->where('id', $customerId)->first();
    }

}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /** 是否展示敏感信息 */
    protected $showSensitiveFields = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (!$this->showSensitiveFields) {
            $this->resource->makeHidden(['phone', 'email']);
        }
        $data = parent::toArray($request);
        $data['bound_phone'] = $this->resource->phone ? true : false; // 是否绑定手机
        $data['bound_wechat'] = ($this->resource->weixin_unionid || $this->resource->weixin_openid) ? true : false; // 是否绑定微信

        return $data;
    }

    public function showSensitiveFields()
    {
        $this->showSensitiveFields = true;
        return $this;
    }
}

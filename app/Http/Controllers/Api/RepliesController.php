<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ReplyResource;
use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ReplyRequest;

class RepliesController extends Controller
{
    // 创建回复
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic()->associate($topic);
        $reply->user()->associate($request->user());
        $reply->save();

        return new ReplyResource($reply);
    }
}

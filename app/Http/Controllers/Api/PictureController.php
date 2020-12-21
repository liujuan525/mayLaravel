<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class PictureController extends Controller
{
    public function index()
    {
        Image::make("http://pd-ttmsapi.huawenfengze.com/api/file/5217/c4f865b6fd79f351b4bee5e4685cf08c0dd0921d9f07323a22dd7f9bdf31e4a1.jpg")
            ->text("王文杰", 50, 50, function($font) {
                $font->file(public_path("fonts/PingFang.otf"));
                $font->size(24);
                $font->align('center');
                $font->angle(45);
            })
            ->save(storage_path("save.jpg"));
    }
}

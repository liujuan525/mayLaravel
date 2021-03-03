<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    public function index()
    {
        // 返回数组格式的数据
//        return CategoryResource::collection(Category::all());
        // 使用分页获取分类数据并返回
//        return CategoryResource::collection(Category::paginate());
        CategoryResource::wrap('data');
        return CategoryResource::collection(Category::all());
    }
}

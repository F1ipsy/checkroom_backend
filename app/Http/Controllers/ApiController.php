<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\Jewelry;
use App\Models\Makeup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_categories(): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function get_clothes(string $id): JsonResponse
    {
        return response()->json(Clothes::query()->where('category_id', 4)->get());
    }

    public function get_makeup(): JsonResponse
    {
        return response()->json(Makeup::all());
    }

    public function get_jewelry(): JsonResponse
    {
        return response()->json(Jewelry::all());
    }


    public function get_category(string $id): JsonResponse
    {
        return response()->json(Category::query()->with("recommendations")->find($id));
    }
}

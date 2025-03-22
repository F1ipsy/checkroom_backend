<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "title" => "required",
                "instruction" => "required",
            ],
            [
                "title.required" => "Введите название категории",
                "instruction.required" => "Введите инструкцию категории",
            ]);
        $category = new Category();
        $category->title = $request->title;
        $category->instruction = $request->instruction;
        $category->save();

        foreach ($request->recommendations as $recommendation) {
            $new_recommendation = new Recommendation();
            $new_recommendation->title=$recommendation;
            $new_recommendation->category_id=$category->id;
            $new_recommendation->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view("category", ["category" => $category, "clothes" => Clothes::query()
            ->where("category_id", $category->id)
            ->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                "title" => "required",
                "instruction" => "required",
                "recommendations" => "required",
            ],
            [
                "title.required" => "Введите название категории",
                "instruction.required" => "Введите инструкцию категории",
                "recommendations.required" => "Введите рекомендации по стилю категории"
            ]);
        $category->title = $request->title;
        $category->instruction = $request->instruction;

        $category_recommendations = Recommendation::query()->where("category_id", $category->id)->get();
        $category_recommendations["0"]->title=$request->recommendations["0"];
        $category_recommendations["1"]->title=$request->recommendations["1"];
        $category_recommendations["2"]->title=$request->recommendations["2"];
        $category_recommendations["3"]->title=$request->recommendations["3"];
        $category_recommendations["0"]->save();
        $category_recommendations["1"]->save();
        $category_recommendations["2"]->save();
        $category_recommendations["3"]->save();

        $category->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}

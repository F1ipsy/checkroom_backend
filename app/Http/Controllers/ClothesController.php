<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClothesController extends Controller
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
        $clothes = new Clothes();
        $clothes->img = "storage/" . $request->file("img")->store("img");
        $clothes->type = $request->type;
        $clothes->correct = $request->correct;
        $clothes->category_id = $request->category;
        $clothes->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Clothes $clothes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Clothes $clothes): View
    {
        return view("clothes.edit", ["category" => $category, "clothes" => $clothes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, Clothes $clothes)
    {
        $clothes->type=$request->type;
        $clothes->correct=$request->correct;
        if ($request->hasFile('img')) {
            $clothes->img = "storage/" . $request->file("img")->store("img");
        }
        $clothes->save();
        return redirect()->route("category.show", ["category" => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clothes $clothes)
    {
        $clothes->delete();
        return redirect()->back();
    }
}

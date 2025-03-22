<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJewelryRequest;
use App\Models\Category;
use App\Models\Jewelry;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JewelryController extends Controller
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
    public function store(StoreJewelryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['img'] = "storage/" . $request->file("img")->store("img");
        if ($request->hasFile('alternateImg')) {
            $data['alternateImg'] = "storage/" . $request->file("alternateImg")->store("img");
        }
        $data['category_id'] = $category->id;
        Jewelry::query()->create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Jewelry $jewelry): View
    {
        return view('jewelry', ["category" => $category, "jewelries" => Jewelry::query()
            ->where("category_id", $category->id)
            ->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Jewelry $jewelry): View
    {
        return view('jewelry.edit', ["category" => $category, "jewelry" => $jewelry]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, Jewelry $jewelry)
    {
        if ($request->hasFile('img')) {
            $jewelry->img = "storage/" . $request->file("img")->store("img");
        }
        if ($request->hasFile('alternateImg')) {
            $jewelry->alternateImg = "storage/" . $request->file("alternateImg")->store("img");
        }
        $jewelry->type = $request->type;
        $jewelry->correct = $request->correct;
        $jewelry->save();
        return to_route("jewelry.show", ["category" => $category, "jewelry" => $jewelry]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jewelry $jewelry)
    {
        $jewelry->delete();
        return redirect()->back();
    }
}

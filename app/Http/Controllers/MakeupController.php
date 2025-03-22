<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMakeupRequest;
use App\Models\Category;
use App\Models\Makeup;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MakeupController extends Controller
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
    public function store(StoreMakeupRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['img'] = "storage/" . $request->file("img")->store("img");
        $data['alternateImg'] = "storage/" . $request->file("alternateImg")->store("img");
        $data['category_id'] = $category->id;
        Makeup::query()->create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Makeup $makeup): View
    {
        return view('makeup', ["category" => $category, "makeup" => Makeup::query()
            ->where("category_id", $category->id)
            ->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Makeup $makeup)
    {
        return view('makeup.edit', ["category" => $category, "makeup" => $makeup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, Makeup $makeup)
    {
        if ($request->hasFile('img')) {
            $makeup->img = "storage/" . $request->file("img")->store("img");
        }
        if ($request->hasFile('alternateImg')) {
            $makeup->alternateImg = "storage/" . $request->file("alternateImg")->store("img");
        }
        $makeup->type = $request->type;
        $makeup->correct = $request->correct;
        $makeup->save();
        return to_route("makeup.show", ["category" => $category, "makeup" => $makeup]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Makeup $makeup)
    {
        $makeup->delete();
        return redirect()->back();
    }
}

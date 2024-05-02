<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('dashboard.categoty.view',compact('categories'));
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
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);
        $category_slug = Str::slug($request->category_name);
        $category_info = Categories::create($request->except('_token') + [
            'category_slug' => $category_slug,
            'added_by' => auth()->user()->role,
        ]);
        if ($request->description) {
            Categories::where('id', $category_info->id)->update([
                'category_description' => $request->description,
            ]);
        }
        if ($request->file('category_photo')) {
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $request->file('category_photo')->getClientOriginalExtension();
            $image = $Image->read($request->file('category_photo'))->resize(450, 450);
            $image->save(('uploads/category_photos/' . $new_name), quality: 80);
            Categories::where('id', $category_info->id)->update([
                'category_photo' => $new_name ,
            ]);
        }
        return back()->with('category_added','New Category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $category_slug = Str::slug($request->category_name);
        Categories::where('id',$category->id)->update([
            'category_name' => $request->category_name,
            'category_slug' => $category_slug,
            'category_description' => $request->category_description,
        ]);
        if ($request->file('category_photo')) {
            unlink('uploads/category_photos/'.$category->category_photo);
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $request->file('category_photo')->getClientOriginalExtension();
            $image = $Image->read($request->file('category_photo'))->resize(450, 450);
            $image->save(('uploads/category_photos/' . $new_name), quality: 80);
            Categories::where('id', $category->id)->update([
                'category_photo' => $new_name ,
            ]);
        }
        return back()->with('category_update','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        if ($category->category_photo) {
            unlink('uploads/category_photos/'.$category->category_photo);
        }
        Categories::where('id',$category->id)->delete();
        return back()->with('category_delete','Category deleted');
    }
    public function make_showcase($showcase,$category_id)
    {
        Categories::where('showcase',$showcase)->update([
            'showcase' => null,
        ]);

        Categories::where('id',$category_id)->update([
            'showcase'=> $showcase,
        ]);
        return back()->with('showcase_update','Category Showcased');
    }
}

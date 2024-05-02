<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        $posts = [];

        $category =  Categories::where('category_name','like','%'.$request->search.'%')->first();



        if ($category != []) {
            $posts = Posts::where('blog_category',Categories::where('category_name','like','%'.$request->search.'%')->first()->id)->get();
        }
        else{
            $posts = Posts::where('blog_title', 'like', '%' . $request->search . '%')->orWhere('blog', 'like', '%' . $request->search . '%')->get();
        }

        // *** Aside bar variables *** //
        $showcase_one = Categories::where('showcase', 'banner_one')->first();
        $banner_one = Posts::where('blog_category', $showcase_one->id)->get();
        $showcase_two = Categories::where('showcase','banner_two')->first();
        $banner_two = Posts::where('blog_category',$showcase_two->id)->get();
        $categories = Categories::latest()->limit(5)->get();
        $recent_posts = Posts::latest()->limit(4)->get();
        $popular_posts = Comments::select('blog_id')->distinct()->latest()->limit(4)->get();

        return view('frontend.search_posts',compact('posts','search','banner_one','showcase_one','showcase_two','banner_two','categories','recent_posts','popular_posts'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Categories;
use App\Models\Comments;
use Illuminate\Http\Request;

class SpecialPostController extends Controller
{
    public function view($special){

        $special;
        $special_posts = Posts::where('blog_speciality',$special)->get();

        // *** Aside bar variables *** //
        $showcase_one = Categories::where('showcase', 'banner_one')->first();
        $banner_one = Posts::where('blog_category', $showcase_one->id)->get();
        $showcase_two = Categories::where('showcase','banner_two')->first();
        $banner_two = Posts::where('blog_category',$showcase_two->id)->get();
        $categories = Categories::latest()->limit(5)->get();
        $recent_posts = Posts::latest()->limit(4)->get();
        $popular_posts = Comments::select('blog_id')->distinct()->latest()->limit(4)->get();

        return view('frontend.special_post',compact('special','special_posts','showcase_one','banner_one','showcase_two','banner_two','categories','recent_posts','popular_posts'));
    }
}

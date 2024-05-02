<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use App\Models\Categories;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.post.post_form');
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
            'blog_title' => 'required',
            'blog_photo' => 'required',
            'category' => 'required',
            'blog' => 'required',
        ]);


        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $request->file('blog_photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('blog_photo'))->resize(720, 580);
        $image->save(('uploads/blog_photos/' . $new_name), quality: 90);

        Posts::insert([
            'user_id' => auth()->user()->id,
            'blog_title' => $request->blog_title,
            'blog_photo' => $new_name,
            'blog_category' =>  $request->category,
            'blog' =>  $request->blog,
            'created_at' => Carbon::now(),
        ]);

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        return view('frontend.post.post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'blog_title' => 'required',
            'category' => 'required',
            'blog' => 'required',
        ]);


        Posts::where('id', $post->id)->update([
            'blog_title' => $request->blog_title,
            'blog_category' =>  $request->category,
            'blog' =>  $request->blog,
            'updated_at' => Carbon::now(),
        ]);

        if ($request->hasFile('blog_photo')) {
            unlink('uploads/blog_photos/'.$post->blog_photo);
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $request->file('blog_photo')->getClientOriginalExtension();
            $image = $Image->read($request->file('blog_photo'))->resize(720, 580);
            $image->save(('uploads/blog_photos/' . $new_name), quality: 90);
            Posts::where('id', $post->id)->update([
                'blog_photo' => $new_name,
            ]);
        }
        return redirect(route('post_view',$post->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        unlink('uploads/blog_photos/'.$post->blog_photo);
        Posts::where('id',$post->id)->delete();
        return redirect(route('index'));
    }

    public function single_view($id)
    {
        $post = Posts::where('id', $id)->first();

        $comments = Comments::where('blog_id',$id)->where('parent_id')->get();

        $comment_count = Comments::where('blog_id',$id)->count();

        // *** Aside bar variables *** //
        $showcase_one = Categories::where('showcase', 'banner_one')->first();
        $banner_one = Posts::where('blog_category', $showcase_one->id)->get();
        $showcase_two = Categories::where('showcase','banner_two')->first();
        $banner_two = Posts::where('blog_category',$showcase_two->id)->get();
        $categories = Categories::latest()->limit(5)->get();
        $recent_posts = Posts::latest()->limit(4)->get();
        $popular_posts = Comments::select('blog_id')->distinct()->latest()->limit(4)->get();

        return view('frontend.post.post_view', compact('post','comments','comment_count','showcase_one','banner_one','showcase_two','banner_two','categories','recent_posts','popular_posts'));
    }
    public function make_feature($id)
    {
        $allready = Posts::where('blog_speciality','feature')->first();

        if ($allready != []) {
            Posts::where('id',$allready->id)->update([
                'blog_speciality' => null,
                'updated_at' => Carbon::now(),
            ]);
        }

        $post = Posts::where('id', $id)->first();
        if($post->blog_speciality != 'feature'){
            Posts::where('id',$id)->update([
                'blog_speciality' => 'feature',
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('success','post made feature');
        }
        return back()->with('warning','post already feature');
    }
    public function make_editor($id)
    {
        $post = Posts::where('id', $id)->first();
        if($post->blog_speciality != 'editor'){
            Posts::where('id',$id)->update([
                'blog_speciality' => 'editor',
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('success',"post made editor's pick");
        }
        return back()->with('warning',"post already editor's pick");
    }
    public function make_trending($id)
    {
        $post = Posts::where('id', $id)->first();
        if($post->blog_speciality != 'trending'){
            Posts::where('id',$id)->update([
                'blog_speciality' => 'trending',
                'updated_at' => Carbon::now(),

            ]);

            return back()->with('success',"post made trending");
        }
        return back()->with('warning',"post already trending");
    }
    public function delete_speciality($id)
    {
        $post = Posts::where('id', $id)->first();
        if($post->blog_speciality){
            Posts::where('id',$id)->update([
                'blog_speciality' => null,
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('success',"post speciality deleted");
        }
        return back()->with('warning',"post doesn't have speciality");
    }
}

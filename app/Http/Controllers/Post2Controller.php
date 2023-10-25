<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

class Post2Controller extends Controller
{
    public function index(){
        //Display the listing of all posts
        //Eloquent

        $posts = Post::all(); //SELECT * FROM posts
        // dd($posts);
        //$posts = Post::where('id', '=', 1)->orderBy("title","DESC")->get();
        //$posts = Post::orderBy("title","DESC")->take(1)->get();
        //$posts = Post::where("id",1)->first();
        //SELECT * FROM posts WHERE id = 1 ORDER BY title DESC
        //Query builder
        //$posts = DB::table("posts")->get(); //SELECT * FROM posts
        //$posts = DB::table("posts")->limit(2)->get(); //SELECT * FROM posts LIMIT 2;
        //$posts = DB::table("posts")->where("id","=",1)->get(); //SELECT * FROM posts where id = 1
        //$posts = DB::table("posts")->orderBy("title","DESC")->take(10)->limit(1)->get();
        //$posts = DB::table("posts")->find(2); //SELECT * FROM posts WHERE id = 1
        //$posts = DB::table("posts")->pluck("title","body");
        //dd($posts = DB::table('posts')->count());

        // $posts = DB::table("posts")
        // ->select("title","body")
        // ->orderBy("title","DESC")
        // ->take(10)
        // ->limit(1)->get();

        // $query = DB::table("posts")
        // ->select("title")
        // ->orderBy("title","DESC")
        // ->take(10)
        // ->limit(1); //SELECT title,body FROM posts order by title DESC limit 1;
        // dd($posts = $query->addSelect("body")->get());
        //dd($posts = DB::table("posts")->distinct()->get());
        //$posts = DB::select("SELECT * FROM posts WHERE id = 1 ORDER BY title DESC");
        return view('posts.index')
        ->with('posts',$posts);
    }

    public function create(){
        return view('posts.create');
    }
    public function store(PostRequest $request){
        $validate = $request->validate([
            'title' => 'required|min:5',
            'body' => ['required','min:5'],
        ]);
        //Eloquent
        // $post = new Post();
        // $post->title = $request->title; //Laravel Framework
        // $post->body = $request->body;
        // $post->slug = Str()->slug($request->title); //laravel-framework
        // $post->save();

        // $post = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'slug' => Str()->slug($request->title),
        // ]);

        //Query builder

        $post = DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str()->slug($request->title),
        ]);

        return redirect()->route("posts.index")
        ->with("success", "Post created successfully");
        //return view("posts.index")
        //->with("success", "Post created successfully");
        //return back()->with('success', "Post created successfully");

    }
    public function show($id){
        $posts = Post::where("id",$id)->first();

        return view("posts.show",compact("posts"));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //Return string
        //return "Hello";

        //View
        //return view("posts.index");

        //Redirect
        //return redirect()->route("helloworld");

        //return redirect()->away("https://www.youtube.com/");

        $programming_language = ["PHP","C#","Java","Python","JavaScript"];
        //return view("posts.index",["languages" => $programming_language]);
        //return view("posts.index")->with("languages", $programming_language);
        return view("posts.index",compact("programming_language"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Retrieving Input Via Dynamic Properties
        $title = $request->title;
        //echo $title;
        //Retrieving An Input Value
        echo $body = $request->input("body");
        //Query string
        //echo $name = $request->query('title');

        //Ip
        echo $ip = $request->ip() ."<br/>";
        //url
        echo $url = $request->url() ."<br/>";

        echo $fullURL = $request->fullUrl();
        echo $path = $request->path();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

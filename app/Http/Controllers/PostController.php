<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Cloudinary;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    //
    public function index(Post $post,User $user)
    {
        $fuser = Auth::user();
        $followed = $fuser->following()->pluck('id');
        $fposts = Post::whereIn("user_id",$followed)->get();
        // dd($fposts);
        return view("posts/index")->with(["posts"=>$post->getPaginateByLimit(),"users"=>$user->getPaginateByLimit(),"fposts"=>$fposts]);
    }
    public function show(Post $post)
    {
        return view("posts/show")->with(["post" => $post]);
    }
    
    public function create()
    {
        return view("posts/create");
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $image_url = Cloudinary::upload($request->file("image")->getRealPath())->getSecurePath();
        $input = $request["post"];
        $user_id = Auth::user()->id;
        $input += ["user_id" => $user_id];
        $input += ["image_url" => $image_url];
        
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view("/posts/edit")->with(["post" => $post]);
    }
    
    public function update(PostRequest $request ,Post $post)
    {
        $input_post = $request["post"];
        $post->fill($input_post)->save();
        
        return redirect("/posts/" . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect("/");
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class FollowController extends Controller
{
    //
    public function index(User $user)
    {
         return view("follows/index")->with(["users"=>$user->getPaginateByLimit()]);
    }
    
    public function create(User $user)
    {
        $followings = Auth::user()->following()->pluck("id")->toArray();
        $users = User::whereNotIn("id",$followings)->get();
        $followed_users = User::whereIn("id",$followings)->get();
        return view("follows/create")->with(["users" =>$users,"fdusers"=> $followed_users]); 
        // $user->getPaginateByLimit()
    }
    
    public function store(Request $request)
    {
        
        $input_user = $request["user"];
        $user = Auth::user();
        $input_follows = $request->follower_id;
        
        $user->following()->attach($input_follows);
        return redirect("/follows/create");
    }
    
    public function delete(User $user,Request $request)
    {
        $following_user = Auth::user();
        $input_follows = $request->follower_id;
        $following_user->following()->detach($input_follows);
        
        return redirect("/follows/create");
    }
}
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
        return view("follows/create")->with(["users" =>$user->getPaginateByLimit()]); 
    }
    
    public function store(Request $request)
    {
        
        $input_user = $request["user"];
        $user = Auth::user();
        $input_follows = $request->users_array;
        
        $user->following()->attach($input_follows);
        return redirect("/follows");
    }
}

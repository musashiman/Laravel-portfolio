<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class FollowController extends Controller
{
    //
    public function follow_index(User $user)
    {
         return view("follows/index")->with(["users"=>$user->getPaginateByLimit()]);
    }
}

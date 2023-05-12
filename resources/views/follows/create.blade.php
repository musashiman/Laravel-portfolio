<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <x-app-layout>
        <x-slot name="header">
            Create_Follow
        </x-slot>
        <h2 class="title">
            Create
        </h2>
        <div >
            @foreach($users as $user)
                @if(Auth::user()->id != $user->id)
                    
                    <div class="create_follower">
                        <form action="/follows" method="POST">
                            @csrf
                            <p class="letters">名前：{{$user->name}}</p>
                            <p class="letters">Email：{{$user->email}}</p>
                            <button class="cursor-pointer" type="submit" value="{{$user->id}}" name="follower_id">フォローする。</button>
                        </form>
                    </div>
                @endif
            @endforeach
            
            @foreach($fdusers as $fduser)
                @if(Auth::user()->id != $fduser->id)
                
                <div class="create_follower">
                    <form action="/follows" method="POST">
                        @csrf
                        @method("DELETE")
                        <p class="letters">名前:{{$fduser->name}}</p>
                        <p class="letters">Email:{{$fduser->email}}</p>
                        <button class="cursor-pointer" type="submit" value="{{$fduser->id}}" name="follower_id">フォロー解除する。</button>
                    </form>
                </div>
                @endif
            @endforeach
        </div>
        
        
        </x-app-layout>
    </body>
</html>

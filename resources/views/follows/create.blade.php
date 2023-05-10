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
        
        <form action="/follows" method="POST">
            <div class="create_follower">
                @foreach($users as $user)
                    @if(Auth::user()->id != $user->id)
                        @csrf
                        <div class="users">
                            <input type="checkbox" value="{{$user->id}}" name="users_array[]">
                                <p class="letters">名前：{{$user->name}}</p>
                                <p class="letters">Email：{{$user->email}}</p>
                            </input>
                        </div>
                    @endif
                @endforeach
            </div>
            <input type="submit" value="フォローする。">
        </form>
        
        
        </x-app-layout>
    </body>
</html>

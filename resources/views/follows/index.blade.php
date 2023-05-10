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
            Follow
        </x-slot>
        <h2 class="title">
            Followers
        </h2>
        <h2 class="create"><a href="/follows/create">フォロワーを作る。</a></h2>
        <div class="users">
            @foreach($users as $user)
                @if(Auth::user()->id != $user->id)
                    <p class="letters">名前：{{$user->name}}</p>
                    
                    <p class="letters">ID：{{$user->id}}</p>
                    
                    <p class="letters">Email：{{$user->email}}</p>
                @endif
            @endforeach
        </div>
        
        </x-app-layout>
    </body>
</html>

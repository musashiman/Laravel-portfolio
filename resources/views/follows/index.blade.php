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
            Follow
        </h2>
        <div class="users">
            @foreach($users as $user)
                @if($user->id != Auth::user()->id)
                    <h2>フォローできるユーザー</h2>
                    <p>{{$user->name}}</p>
                @endif
            @endforeach
        </div>
        </x-app-layout>
    </body>
</html>

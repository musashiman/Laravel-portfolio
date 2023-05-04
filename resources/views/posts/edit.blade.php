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
            Edit
        </x-slot>
            <h1 class="page-title">Post Edit</h1>
            <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            @method("PUT")
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{$post->title}}"/>
                </div>
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>

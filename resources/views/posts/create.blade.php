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
            Create
        </x-slot>
            <h1 class="page-title">Post Create</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{old("post.title")}}"/>
                    <p class="title_error" style="color:red">{{$errors->first("post.title")}}</p>
                </div>
                <div class="image">
                    <input type="file" name="image">
                    <p class="image_error" style="color:red">{{$errors->first("image")}}</p>
                </div>
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>

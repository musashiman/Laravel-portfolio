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
        <h1 class="page-title">Post Show</h1>
        <div class="content_post">
            <img src="{{$post->image_url}}" alt="画像が読み込めませんわい。"/>
            <h2 class="title"><a href="/posts/{{$post->id}}/edit">{{$post->title}}</a></h2>
            <p class="makeday">作成日時:{{$post->created_at}}</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

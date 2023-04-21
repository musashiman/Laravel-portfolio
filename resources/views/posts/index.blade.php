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
        <h2><a href="/posts/create">create</a></h2>
       <div class="posts">
           @foreach($posts as $post)
           <div class="post">
                <h2 class="title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                <p class="date">{{$post->created_at}}</p>
           </div>
           
           <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
               @csrf
               @method("DELETE")
               <button type="button" onclick="deletePost({{$post->id}})">削除</button>
           </form>
           @endforeach
       </div>
       
       <div class="paginate">
           {{ $posts->links()}}
       </div>
       
       <script>
        function deletePost(id)
        {
        'use strict'
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
        document.getElementById(`form_${id}`).submit();
        }
        }
        </script>
    </body>
</html>

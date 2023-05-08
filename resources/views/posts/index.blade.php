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
            Index
        </x-slot>
        <!--ここから編集を再開する。cssの適応を終えた後、リレーションを完成させる。-->
            <div class="md:flex justify-start md:space-x-16 pr-8">
                <h1 class="page_title">Index</h1>
                <h1 class="title"><a href="/follows">Follow</a></h1>
                <h1><a href="/posts/create">create</a></h1>
            </div>
                
               <div class="posts">
               @foreach($posts as $post)
               @if(Auth::user()->id ==$post->user_id )
               <div class="post">
                    <h1 class="title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class="date">{{$post->created_at}}</p>
                    <p class="user_id">ログインユーザーID：{{$post->user_id}}</p>
               </div>
               
               <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                   @csrf
                   @method("DELETE")
                   <button type="button" onclick="deletePost({{$post->id}})">削除</button>
               </form>
               @endif
               @endforeach
           </div>
           
           <p>ログインユーザー：{{ Auth::user()->name}}</p>
           
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
        </x-app-layout>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
            <div class="flex justify-start space-x-16 pr-8">
                <div class="title">Index</div>
                <div class="title"><a href="/follows">Follow</a></div>
                <div class="title"><a href="/posts/create">create</a></div>
                <div class="title"><a href="/snaps/index">Snap</a></div>
            </div>
                
               
           
           </br>
            <section class="text-gray-600 body-font">
              <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    
               @foreach($posts as $post)
                   @if(Auth::user()->id ==$post->user_id )
                   
                  <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                      <img class="lg:h-48 md:h-36 w-full object-cover object-center h-64 w-80" src="{{$post->image_url}}" alt="blog">
                      <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">ログインユーザー:{{Auth::user()->name}}</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$post->title}}</h1>
                        <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                        <div class="flex justify-between items-center flex-wrap ">
                            <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="/posts/{{$post->id}}">投稿詳細ページはこちら。
                            </a>
                            <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="deletePost({{$post->id}})">削除</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   @endif
               @endforeach
                  
                </div>
              </div>
            </section>
            
           <p>ログインユーザー：{{ Auth::user()->name}}</p>
           
           <div class="paginate">
               {{ $posts->links()}}
           </div>
           
           <div class="snap">
                       <!--次はここから行う。リレーションは完了して次はフォローしているユーザーの投稿を観れるようにすることと、その当行に対してスナップ（ログインユーザーの投稿）を紐づけられるようにしていこう。-->
               <h2 class="snap_post">フォローしているユーザーの投稿↓</h2>
               @foreach($fposts as $fpost)
                        <div class="post">
                            <h1 class="title"><a href="/posts/{{$fpost->id}}">{{$fpost->title}}</a></h2>
                            <p class="date">{{$fpost->created_at}}</p>
                            <p class="user_id">ログインユーザーID：{{$fpost->user_id}}</p>
                        </div>
               @endforeach
           </div>
           
           
           
           
        </x-app-layout>
        
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

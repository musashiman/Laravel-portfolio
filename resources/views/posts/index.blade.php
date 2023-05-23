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
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
          <nav class="-mb-0.5 flex space-x-6">
            <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 active" href="/" aria-current="page">
              Index
            </a>
            <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" href="/follows">
              Follow
            </a>
            <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" href="/posts/create">
              Create
            </a>
          </nav>
        </div>
        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Login User Post</h1>
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
                    <p class="leading-relaxed mb-3">Let's look at life objectively by keeping a record of our everyday selves!</p>
                    <div class="flex justify-between items-center flex-wrap ">
                        <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="/posts/{{$post->id}}">投稿詳細ページはこちら。
                        </a>
                        <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="button" onclick="deletePost({{$post->id}})" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-gray-200 font-semibold text-gray-500 hover:text-white hover:bg-gray-500 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-all text-sm  dark:hover:bg-gray-600 dark:border-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800">削除</button>
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
            
           
                       <!--次はここから行う。リレーションは完了して次はフォローしているユーザーの投稿を観れるようにすることと、その当行に対してスナップ（ログインユーザーの投稿）を紐づけられるようにしていこう。-->
        <section class="text-gray-600 body-font">
           <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Following Users Posts</h1>
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4"> 
            @foreach($fposts as $fpost)
                @foreach($users as $user)
                @if($user->id == $fpost->user_id)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center h-64 w-80" src="{{$fpost->image_url}}" alt="blog">
                            <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">投稿ユーザー:{{$user->name}}</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$fpost->title}}</h1>
                            <p class="leading-relaxed mb-3">Let's look at life objectively by keeping a record of our everyday selves!</p>
                            <div class="flex justify-between items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="/posts/{{$fpost->id}}">投稿詳細ページはこちら。
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                        
                @endif
                @endforeach
            @endforeach
            
           </div>
          </div>
        </section>
            
        
        <footer class="text-gray-600 body-font">
          <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <span class="ml-3 text-xl">Tailblocks</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 Tailblocks —
              <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@knyttneve</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </footer>
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

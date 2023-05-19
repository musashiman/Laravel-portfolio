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
            Show
        </x-slot>
        <section class="text-gray-600 body-font">
          <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{$post->image_url}}">
            <div class="text-center lg:w-2/3 w-full">
              <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$post->title}}</h1>
              <p class="mb-8 leading-relaxed">作成日時:{{$post->created_at}}</p>
              <p class="mb-8 leading-relaxed">Remember what you were doing and feeling on that day and at that time!This way you can continue to put in and grow without making the same mistakes!</p>
              <div class="flex justify-center">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="/posts/{{$post->id}}/edit">編集はこちらへ！</a></button>
                <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg"><a href="/">メイン画面はこちらへ！</a></a></button>
              </div>
            </div>
          </div>
        </section>
      
        </x-app-layout>
    </body>
</html>

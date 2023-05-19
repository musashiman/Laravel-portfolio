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
    
        <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Comment Form -->
          <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="mx-auto max-w-2xl">
              <div class="text-center">
                <h2 class="text-xl text-gray-800 font-bold sm:text-3xl dark:text-white">
                  Post a your Post
                </h2>
              </div>
          
              <!-- Card -->
              <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-gray-800 dark:border-gray-700">
                
                  <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">Post Title</label>
                    <input type="text" name="post[title]" id="hs-feedback-post-comment-name-1" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Leave your Post Title here..." value="{{old("post.title")}}">
                    <p class="title_error mb-8 leading-relaxed" style="color:red">{{$errors->first("post.title")}}</p>
                  </div>
          
                  <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium dark:text-white">Post Image</label>
                    <input type="file" name="image" id="hs-feedback-post-comment-email-1" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Leave your Post Image here...">
                    <p class="image_error mb-8 leading-relaxed" style="color:red">{{$errors->first("image")}}</p>
                  </div>
                  <div class="mt-6 grid">
                    <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all dark:focus:ring-offset-gray-800">Submit</button>
                  </div>
                
              </div>
              <!-- End Card -->
            </div>
          </div>
<!-- End Comment Form -->
        </form>
        <div class="footer">
            <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg"><a href="/">メイン画面はこちらへ！</a></a></button>
        </div>
        </x-app-layout>
    </body>
</html>

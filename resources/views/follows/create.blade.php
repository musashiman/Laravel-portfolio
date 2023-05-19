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
            Create_Follow
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
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">All Users</h1>
              <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Follow users on this page so you can watch others post! It's motivating for users to be able to share their posts with their followers!</p>
            </div>
            <div class="flex flex-wrap -m-2">
            @foreach($users as $user)
                @if(Auth::user()->id != $user->id)
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <form action="/follows" method="POST">
                    @csrf
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                          <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/88x88/000/fff&text=Icon">
                          <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">{{$user->name}}</h2>
                            <p class="text-gray-500">{{$user->email}}</p>
                          </div>
                            
                            <button type="submit" class="py-[.688rem] px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-gray-200 font-semibold text-blue-500 hover:text-white
                            hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:border-gray-700 dark:hover:border-blue-500" value="{{$user->id}}" name="follower_id">
                              Follow
                            </button>
                        </div>
                            
                </form>
                </div>
                @endif
            @endforeach
            
            @foreach($fdusers as $fduser)
                @if(Auth::user()->id != $fduser->id)
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <form action="/follows" method="POST">
                    @csrf
                    @method("DELETE")
                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                  <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/88x88/000/fff&text=Icon">
                  <div class="flex-grow">
                    <h2 class="text-gray-900 title-font font-medium">{{$fduser->name}}</h2>
                    <p class="text-gray-500">{{$fduser->email}}</p>
                  </div>
                <button type="submit" class="py-[.688rem] px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-gray-200 font-semibold text-blue-500 hover:text-white
                hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:border-gray-700 dark:hover:border-blue-500" value="{{$fduser->id}}" name="follower_id">
                    Unfollow
                </button>
                </div>
                
                </form>
              </div>
                @endif
            @endforeach
            
             
            </div>
          </div>
        </section>
        
        <div >
            
        </div>
        
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg"><a href="/">ホームに戻る。</a></a></button>
        
        </x-app-layout>
    </body>
</html>

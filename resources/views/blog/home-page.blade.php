<x-guest-layout >

    @section('page_title', "Home")

    <header id="page-hero" class="hero-height">

        <section class="container mx-auto h-full flex flex-col items-center justify-center">
            <div class="w-full text-center">
                <h1 class="text-3xl font-black text-black uppercase lg:text-5xl">We teach you How to Create good designs and websites</h1>
                <div align="center" class="mt-8 px-3">
                    <img width="100%" src="/assets/hero.svg" alt="Spread the knowledge">
                </div>
            </div>
            
        </section>

    </header>

    <section class="w-full latest pb-9">
        <div class="container mx-auto py-9">
            <h2 class="ml-3 text-2xl font-bold md:ml-0">Latest posts</h2>
        </div>
        <div class="container grid grid-cols-1 gap-4 px-5 mx-auto sm:grid-cols-2 sm:px-0">

            @foreach ($latest_posts as $post)
                @livewire('components.post-card', ['post' => $post, 'class' => ['thumbnail' => "h-full", 'wrapper' => "h-full w-full"]])
            @endforeach

            <div class="flex items-center justify-center mt-5 more col-span-full">
                <a class="px-4 py-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50" 
                    href="{{route('posts')}}">See all posts</a>
            </div>
        </div>
    </section>

    @if (count($latest_modules) > 0)
    <section class="w-full latest pb-9">
        <div class="container mx-auto py-9">
            <h2 class="ml-3 text-2xl font-bold md:ml-0">Latest modules</h2>
        </div>
        <div class="container grid grid-cols-1 gap-4 px-5 mx-auto sm:grid-cols-3 sm:px-0">

            @foreach ($latest_modules as $module)
                @livewire('components.module-card', ['module' => $module])
            @endforeach

            <div class="flex items-center justify-center mt-5 more col-span-full">
                <a class="px-4 py-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50" 
                    href="{{route('modules')}}">See all modules</a>
            </div>
        </div>
    </section>
    @endif

    <section id="newsletter" role="form" class="container pb-10 mx-auto">
        <div class="w-11/12 mx-auto md:w-4/5 wrapper">
            <div class="flex flex-col-reverse overflow-hidden bg-white rounded-md shadow-xl md:flex-row">
                <div class="flex flex-col items-start justify-between w-full p-2 content md:p-7 md:w-1/2" x-data="{sendDisabled: false}">
                    <header>
                        <h3 class="mt-3 mb-2 text-3xl font-bold md:mt-0">Newsletter</h3>
                    </header>
                    <div class="description">
                        <p class="text-sm">Subscribe to our newsletter to get notified when a new post is published, and to recieve speciel offers and assets.</p>
                    </div>

                    @if (session('state'))
                        <div class="alert w-full alert-{{session('state')}}">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <form @submit="sendDisabled = true" method="post" action="{{route('newsletter.request')}}" class="flex flex-col w-full py-5 md:w-3/5 subscription-form">
                        @csrf
    
                        <div class="flex flex-col w-full p-2 input-group">
                            <label for="name" class="mb-1 text-sm font-medium">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" required placeholder="Mehdi Jai" class="text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox">
                            @error('name')
                                <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-full p-2 input-group">
                            <label for="email" class="mb-1 text-sm font-medium">Email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" required placeholder="mehdi@medostudios.com" class="text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox">
                            @error('email')
                                <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="w-full p-3 cta">
                            <button type="submit" :disabled="sendDisabled" role="button" class="px-4 py-2 mb-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed disabled:text-gray-400 text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50">Send</button>
                        </div>
                    </form>
                </div>
                <div class="w-full h-12 thumbnail md:h-auto md:w-1/2">
                    <img src="/assets/bg.jpg" alt="colored smoke image" class="object-cover w-full h-full md:clip-path">
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>

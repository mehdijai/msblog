<div class="w-full">
    <header role="banner" class="relative z-0 flex items-center justify-center w-full h-64 bg-black bg-opacity-75 bg-center bg-no-repeat bg-cover md:h-96 bg-blend-overlay" style="background-image: url({{$post->thumbnail}})">
        <div class="absolute top-0 left-0 z-10 w-full h-full bg-black overlay bg-opacity-40 backdrop-blur-sm"></div>
        <div class="z-20 w-11/12 mx-auto text-left md:w-3/4 lg:w-1/2">
            <h1 class="mb-3 text-5xl font-black tracking-wider text-white uppercase">{{$post->title}}</h1>
            <a class="text-base font-bold uppercase transition duration-500 ease-in-out text-golden hover:text-golden-light" href="{{route('category', ['slug' => $post->category->slug])}}">{{$post->category->title}}</a>
        </div>
    </header>
    <article role="article" class="z-30 w-11/12 mx-auto -translate-y-16 bg-white rounded-md shadow-lg post-article md:w-3/4 lg:w-1/2 p-7">
        {!! $post->content !!}
    </article>
</div>
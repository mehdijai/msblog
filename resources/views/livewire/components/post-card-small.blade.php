<div class="bg-white rounded-md overflow-hidden flex flex-col-reverse shadow-xl transition-all duration-500 ease-in-out">
    <div class="content h-full flex flex-col items-start pl-3 pr-1 py-3">
        <div class="category">
            <a class="font-medium text-xs text-golden-light uppercase transition duration-500 ease-in-out hover:text-golden" href="{{route('category', ['slug' => $post->category->slug])}}">{{$post->category->title}}</a>
        </div>
        <div class="title mb-1">
            <h3 class="font-semibold text-base">{{$post->title}}</h3>
        </div>
        <div class="caption text-sm mb-5">
            <p>{{$post->brief}}</p>
        </div>
        <div class="cta mt-auto">
            <a href="{{route('post', ['slug' => $post->slug])}}" class="text-golden-dark italic font-bold text-sm transition-colors duration-300 ease-in-out hover:text-golden">View Post</a>
        </div>
    </div>
    <div class="thumbnail h-full">
        <img src="{{$post->thumbnail}}" alt="{{$post->title}}" class="h-full w-full object-cover">
    </div>
</div>
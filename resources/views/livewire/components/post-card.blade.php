<div class="@if(isset($post->hero)) hero-post-card card-width @else card-small-width @endif @if(isset($class['wrapper'])) {{$class['wrapper']}} @endif relative bg-white rounded-md overflow-hidden flex flex-col-reverse md:flex-row shadow-xl transition-all duration-500 ease-in-out">
    <div class="content flex flex-col items-start pl-3 pr-1 py-3 w-full md:w-1/2">
        <div class="categoty">
            <a class="font-medium text-xs text-golden-light uppercase transition duration-500 ease-in-out hover:text-golden" href="{{route('category', ['slug' => $post->category->slug])}}">{{$post->category->title}}</a>
        </div>
        <div class="title mb-1">
            <h3 class="font-bold text-base">{{$post->title}}</h3>
        </div>
        <div class="caption text-sm mb-3">
            <p>{{$post->brief}}</p>
        </div>
        <div class="cta mt-auto">
            <a href="{{route('post', ['slug' => $post->slug])}}" class="text-golden-dark italic font-bold text-sm transition-colors duration-300 ease-in-out hover:text-golden">View Post</a>
        </div>
    </div>
    <div class="thumbnail w-full md:w-1/2 @if(isset($class['thumbnail'])) {{$class['thumbnail']}} @endif">
        <img src="{{$post->thumbnail}}" alt="{{$post->title}}" class="h-full w-full object-cover md:clip-path">
    </div>

    @if (!is_null($post->module) && !request()->routeIs('module'))
        <a class="module-band" href="{{route('module', ['slug' => $post->module->slug])}}">
            <div class="title">
                <span>Module</span>
            </div>
            
            <div role="separator" class="w-0 h-6 mx-1 border-l-2 border-golden-dark border-opacity-20"></div>

            <div class="module-name">
                <p>
                    {{$post->module->title}}
                </p>
            </div>
        </a>
    @endif
</div>
<section class="container px-2 mx-auto all-posts md:px-0">

    <div class="navigation" role="navigation">
        @livewire('components.navigation', ['page_type' => $page_type])
    </div>

    @livewire('components.separator')
    
    @if (!empty($posts))
        <div class="grid w-full grid-cols-1 gap-4 px-5 posts sm:grid-cols-2 md:grid-cols-2 sm:px-0" role="feed">
            @foreach ($posts as $post)
                @livewire('components.post-card', ['post' => $post, 'class' => ['thumbnail' => "h-full", 'wrapper' => "h-full w-full"]])
            @endforeach
        </div>
    @endif

    
    @if (!empty($modules))
        <div class="grid w-full grid-cols-1 gap-4 px-5 posts sm:grid-cols-2 md:grid-cols-3 sm:px-0" role="feed">
            @foreach ($modules as $module)
                @livewire('components.module-card', ['module' => $module])
            @endforeach        
        </div>
    @endif

    @if (!empty($posts))     
        @unless (count($posts))
            <div class="w-full py-5 text-center">
                <h3 class="mb-5 text-2xl font-bold text-black">It seems there is no content here!!</h3>
                <a class="px-4 py-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50" 
                            href="{{route('home')}}">Go to home page</a>
            </div>
        @endunless
    @endif

    @if (!empty($modules))     
        @unless (count($modules))
            <div class="w-full py-5 text-center">
                <h3 class="mb-5 text-2xl font-bold text-black">It seems there is no content here!!</h3>
                <a class="px-4 py-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50" 
                            href="{{route('home')}}">Go to home page</a>
            </div>
        @endunless
    @endif
    

    @livewire('components.separator')

    @if (!empty($posts))     
        <div class="paginations" role="navigation">
            {{$posts->appends(request()->except('page'))->links()}}
        </div>
    @endif

    @if (!empty($modules))     
        <div class="paginations" role="navigation">
            {{$modules->appends(request()->except('page'))->links()}}
        </div>
    @endif

    

</section>
<footer class="relative w-full bg-black">
    
    <div class="absolute top-0 left-0 hidden h-full py-5 pl-5 origin-top-left md:block">
        @livewire('icons.arrow-watermark', ['class' => "h-full"])
    </div>

    <div class="container flex flex-col items-center justify-between p-5 mx-auto">

        <div class="flex items-center justify-center w-full py-5">
            <img src="/assets/logo-white.png" alt="msblog white logo" class="h-8" role="img">
        </div>

        <div class="flex flex-col items-start justify-between w-full py-6 my-5 md:flex-row">

            @foreach ($footer_featured as $link)
                <div class="w-full px-3 my-3 text-center md:my-0">
                    <a href="{{$link['link']}}" class="text-sm font-semibold text-gray-50 hover:text-golden-light">{{$link['name']}}</a>
                </div>
            @endforeach

        </div>

        <div class="flex flex-col items-center justify-start w-full py-5 md:flex-row">

            <div class="flex socialMedia">
                @foreach ($social_media_links as $link)
                    <a href="{{$link['link']}}" class="mr-2">
                        @livewire($link["name"])
                    </a>
                @endforeach
            </div>

            <div class="mt-5 ml-0 text-center md:ml-auto md:mt-0 md:text-right">
                <span role="doc-footnote" class="text-sm text-golden-light">
                    MSBlog © {{Date('Y')}} | Powered by <a href="https://www.medostudios.com" class="font-bold hover:text-golden">MEDOSTUDIOS</a>
                </span>
            </div>
        </div>
    </div>

    <div class="absolute top-0 right-0 hidden h-full py-5 pr-5 origin-top-right md:block">
        @livewire('icons.arrow-watermark', ['class' => "h-full rotate-180"])
    </div>

</footer>
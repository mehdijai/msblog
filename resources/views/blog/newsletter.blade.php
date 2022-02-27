<x-guest-layout>

    @section('page_title', "Newsletter state")

    <section class="w-full bg-gray-50" role="article">

        <div class="w-full">
            <header role="banner" class="relative z-0 flex items-center justify-center w-full h-64 bg-black bg-opacity-75 bg-center bg-no-repeat bg-cover md:h-96 bg-blend-overlay" style="background-image: url('/assets/bg.jpg')">
                <div class="absolute top-0 left-0 z-10 w-full h-full bg-black overlay bg-opacity-40 backdrop-blur-sm"></div>
                <div class="z-20 w-11/12 mx-auto text-left md:w-3/4 lg:w-1/2">
                    <h1 class="mb-3 text-3xl font-black tracking-wider text-white uppercase md:text-5xl">Newsletter States</h1>
                </div>
            </header>
            <article role="article" class="z-30 w-11/12 mx-auto -translate-y-16 bg-white rounded-md shadow-lg md:w-3/4 lg:w-1/2 p-7">
                @isset($state)
                    <p class="w-full text-base font-bold p-3 rounded-md text-center h-52 flex items-center justify-center newsletter-{{$state}}">
                        {{ $message }}
                    </p>
                @endisset
            </article>
        </div>
        
    </section>

</x-guest-layout>

<x-guest-layout>

    @section('page_title', "About us")
    
    @section('schema-markup')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Corporation",
          "name": "MSBlog",
          "alternateName": "Medostudios",
          "url": "{{env('APP_URL')}}",
          "logo": "{{env('APP_URL')}}/assets/logo.svg",
          "sameAs": [
            "https://www.facebook.com/mehdi.dsgn",
            "https://www.twitter.com/mehdi.dsgn",
            "https://www.instagram.com/mehdi.dsgn",
            "https://www.medostudios.com"
          ]
        }
    </script>
    @endsection

    <section class="w-full bg-gray-50" role="article">

        <div class="w-full">
            <header role="banner" class="relative z-0 flex items-center justify-center w-full h-64 bg-black bg-opacity-75 bg-center bg-no-repeat bg-cover md:h-96 bg-blend-overlay" style="background-image: url('/assets/bg.jpg')">
                <div class="absolute top-0 left-0 z-10 w-full h-full bg-black overlay bg-opacity-40 backdrop-blur-sm"></div>
                <div class="z-20 w-11/12 mx-auto text-left md:w-3/4 lg:w-1/2">
                    <h1 class="mb-3 text-3xl font-black tracking-wider text-white uppercase md:text-5xl">About us</h1>
                </div>
            </header>
            <article role="article" class="z-30 w-11/12 mx-auto -translate-y-16 bg-white rounded-md shadow-lg md:w-3/4 lg:w-1/2 p-7">

                <p class="text-sm">
                    MSBlog is a creative blog interested in design and web development. The purpose is to spread the knowledge I have gathered through my life. The blog was created by Mehdi Jai: a Brand identity designer and full-stack developer. Also, the founder of <a href="https://www.medostudios.com" class="link uppercase">Medostudios</a> and the co-founder of <a href="https://www.tabarro3.ma" class="link uppercase">Tabarro3</a> and <a href="https://www.autodrive.ma" class="link uppercase">Autodrivemaroc</a><div class="br"></div>
                    This blog includes many concepts, Articles, categories, and modules.
                    Articles and categories are familiar in the blogging field. However, the module is our special concept.
                    We came up with this concept to help us create a series. If the project or the idea we are publishing has many articles or parts, this concept we gather those articles to keep them organized and accessible for you.
                    We talk on this page about design and web development, And what’s related to them.
                </p>

                <h2 class="my-10 text-3xl font-bold">Topics</h2>

                <div class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
                    @foreach ($categories as $category)
                        <div class="flex flex-col items-stretch justify-between w-full p-4 bg-black rounded-md text-gray-50">
                            <p class="text-xs">{{$category->description}}</p>
                            <a class="p-2 mt-5 text-xs font-semibold tracking-wide text-center uppercase transition-colors duration-300 ease-in-out rounded-md hover:bg-golden-light bg-golden-dark" href="{{route('category', ['slug' => $category->slug])}}">{{$category->title}}</a>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
        
    </section>

</x-guest-layout>

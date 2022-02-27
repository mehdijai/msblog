<x-guest-layout>

    @section('page_title', "Contact us")
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
                    <h1 class="mb-3 text-3xl font-black tracking-wider text-white uppercase md:text-5xl">Contact us</h1>
                </div>
            </header>
            <article role="article" class="z-30 w-11/12 mx-auto -translate-y-16 bg-white rounded-md shadow-lg md:w-3/4 lg:w-1/2 p-7"
                x-data="{
                    sendDisabled: false,
                }">
                <p class="w-full mx-auto mt-5 mb-8 text-lg font-bold text-center md:w-3/5 md:text-xl">
                    We are here for you! If you need any help, don’t hesitate to contact us.
                </p>

                @if (session('state'))
                    <div class="alert w-full md:w-3/5 mx-auto alert-{{session('state')}}">
                        {{ session('message') }}
                    </div>
                @endif

                <form @submit="sendDisabled = true" method="post" action="{{route('contact.send')}}" class="flex flex-col w-full py-5 mx-auto md:w-3/5 contact-form">
                    @csrf

                    <div class="flex flex-col items-center justify-between w-full md:flex-row input-line">
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
                    </div>
                    <div class="flex flex-col w-full p-2 input-group">
                        <label for="subject" class="mb-1 text-sm font-medium">Subject</label>
                        <input type="text" name="subject" id="subject" value="{{old('subject')}}" required placeholder="It's about ..." class="text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox">
                        @error('subject')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full p-2 input-group">
                        <label for="message" class="mb-1 text-sm font-medium">Message</label>
                        <textarea rows="5" name="message" id="message" value="{{old('message')}}" required placeholder="Hi there 👋🏽" class="text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox"></textarea>
                        @error('message')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="w-full p-3 cta">
                        <button type="submit" :disabled="sendDisabled" role="button" class="px-4 py-2 mb-2 text-xs font-bold uppercase transition duration-500 ease-in-out rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed disabled:text-gray-400 text-golden-dark bg-golden-light bg-opacity-30 hover:bg-opacity-50">Send</button>
                        
                        @if(config('services.recaptcha.key'))
                            <div class="g-recaptcha"
                                data-sitekey="{{config('services.recaptcha.key')}}">
                            </div>

                            @error('g-recaptcha-response')
                                <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                        @endif
                    </div>
                </form>

            </article>
        </div>
    </section>

</x-guest-layout>
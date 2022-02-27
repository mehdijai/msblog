<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og:http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:site_name" content="MSBlog">
@hasSection ('custom-description')
<meta name="description" content="@yield('custom-description')">
@else
<meta name="description" content="creative blog">
@endif
@hasSection ('custom-author')
<meta name="description" content="@yield('custom-author')">
@else
<meta name="description" content="Mehdi Jai | MEDOSTUDIOS">
@endif
@hasSection ('custom-keywords')
<meta name="keywords" content="@yield('custom-keywords')">
@else
<meta name="keywords" content="blog, graphic design, design, ui, ux, designer, creative, web tech, color theory, beginner designer">
@endif
@hasSection ('custom_og_meta')
@yield('custom_og_meta')
@else
<meta property='og:url' content='{{  Request::url() }}' />
@php
    $post = \App\Models\Post::where('archived', false)->first();
@endphp
@if ($post != null)
<meta property='og:image' content='{{$post->thumbnail}}' /> 
@endif
<meta property='og:image:alt' content='MSBlog' /> 
<meta property='og:type' content='article' /> 
<meta property='article:author' content='Mehdi Jai | MEDOSTUDIOS' /> 
<meta property='article:section' content='Global' /> 
@endif
@hasSection('page_title')
<title>@yield('page_title') | MSBlog</title>
@else
<title>MSBlog</title>
@endif
@hasSection ('schema-markup')
@yield("schema-markup")
@else
<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "MSBlog",
      "url": "http://tes.dec",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{{env('APP_URL')}}/posts?search={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
</script>
@endif
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

<script src='https://www.google.com/recaptcha/api.js'></script>
        
    </head>
    <body class="w-full min-h-screen">

        @livewire('guest.navigation-bar')

        <main class="w-full font-sans antialiased text-black bg-gray-100">
            {{ $slot }}
        </main>

        @livewire('guest.footer')

        @livewireScripts

        <!-- Scripts -->
        @stack('child-scripts')
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>

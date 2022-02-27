<x-guest-layout>

    @section('page_title', $page_title)

    <section class="w-full all-posts pb-9">
        <div class="container px-2 mx-auto md:px-0 py-9">
            <h2 class="ml-3 text-2xl font-bold md:ml-0">{{$page_title}}</h2>
            <div class="p-4 mt-3 mb-3 bg-white rounded-md">
                <h4 class="font-semibold text-golden-dark text-md md:ml-0">What is a module</h4>
                <p class="text-sm text-gray-800">
                    A module is a group of articles. Its purpose is to help us create a series. If the project or the idea we are publishing has many articles or parts, this concept gathers those articles to keep them organized and accessible for you. <br>
                    If the article belongs to a module, a band will be displayed on the card.
                </p>
            </div>
        </div>

        @switch($page_title)

            @case('All modules')
                @livewire('page.show-posts', ['page_type' => 'modules'])
                @break
                
        @endswitch

    </section>

</x-guest-layout>

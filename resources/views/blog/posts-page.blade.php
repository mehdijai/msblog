<x-guest-layout>

    @section('page_title', $page_title)

    <section class="w-full all-posts pb-9">
        <div class="container px-2 mx-auto md:px-0 py-9">
            <h2 class="ml-3 text-2xl font-bold md:ml-0">{{$page_title}}</h2>
            @isset($category_name)
            <div class="p-4 mt-3 mb-3 bg-white rounded-md">
                <h4 class="font-semibold text-golden-dark text-md md:ml-0">{{$category_name}}</h4>
                <p class="text-sm text-gray-800">
                    {{$category_description}}
                </p>
            </div>
            @endisset
        </div>

        @switch($page_title)

            @case('All Posts')
                @livewire('page.show-posts', ['page_type' => 'posts'])
                @break
            @case('Category')
                @livewire('page.show-posts', ['page_type' => 'category', 'category_id' => $category_id])
                @break
                
        @endswitch

    </section>

</x-guest-layout>

<x-guest-layout>

    @livewire('components.metadata', ['meta_data' => $meta_data, 'og_meta_data' => $og_meta_data, 'schema_markup' => $schema_markup])

    <section class="w-full bg-gray-50" role="article">
        @livewire('components.post-component', ['post' => $post])
    </section>

    @livewire('components.separator', ['class' => ['section' => 'bg-gray-50']])

    <section class="w-full px-5 py-8 bg-gray-50">
        <div class="container mx-auto py-9">
            <h2 class="ml-3 text-2xl font-bold md:ml-0">Related posts</h2>
        </div>
        <div class="container grid grid-cols-1 gap-4 mx-auto sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($related_posts as $post)
                @livewire('components.post-card-small', ['post' => $post])
            @endforeach
        </div>
    </section>

</x-guest-layout>

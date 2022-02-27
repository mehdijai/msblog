<nav class="flex flex-col items-center px-4 py-4 text-center bg-white rounded-md md:flex-row">
    
    <div class="w-full search-controller">
        <form method="get" class="flex items-center">

            @if (request()->has('perPage'))
                <input type="hidden" name="perPage" value="{{request('perPage')}}">
            @endif

            @if (request()->has('page'))
                <input type="hidden" name="page" value="{{request('page')}}">
            @endif

            @if (request()->has('sort'))
                <input type="hidden" name="sort" value="{{request('sort')}}">
            @endif

            @if (request()->has('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
            @endif

            <input name="search" placeholder="Search a keyword or a post title" @if(request()->has('search')) value="{{request('search')}}" @endif type="text" class="w-full px-2 text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200">
            
            <button type="submit" class="flex items-center justify-center px-3 py-2 ml-2 text-sm font-bold transition duration-300 ease-in-out rounded-md bg-golden-light bg-opacity-10 hover:bg-opacity-30 disabled:bg-gray-200 disabled:cursor-not-allowed">
                <span class="text-xs material-icons-outlined">search</span>
            </button>
        </form>
    </div>

    <div class="hidden md:block">
        @livewire('components.separator', ['dir' => 'v'])
    </div>

    <div class="w-full mt-3 md:mt-0 md:w-2/5 xl:w-1/5 order-controller">
        <form method="get" class="flex items-center">

            @if (request()->has('page'))
                <input type="hidden" name="page" value="{{request('page')}}">
            @endif

            @if (request()->has('perPage'))
                <input type="hidden" name="perPage" value="{{request('perPage')}}">
            @endif

            @if (request()->has('search'))
                <input type="hidden" name="search" value="{{request('search')}}">
            @endif
            
            @if (request()->has('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
            @endif
            
            <select required onchange="this.form.submit()" name="sort" id="sort" class="w-full px-2 text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200">
                <option @if (request()->has('sort') && request('sort') == 'new') selected @endif value="new">Newest</option>
                <option @if (request()->has('sort') && request('sort') == 'old') selected @endif value="old">Oldest</option>
            </select>
            
            <label for="sort" class="flex items-center justify-center px-3 py-2 ml-2">
                <span class="text-xs text-gray-600 material-icons-outlined">filter_list</span>
            </label>
        </form>
    </div>
</nav>

@if ($page_type == "posts")
    <nav class="flex items-center px-4 py-4 mt-5 text-center bg-white rounded-md">
        <div class="inline w-full search-controller">
            <form method="get" x-ref="cat_form" class="flex flex-wrap items-center" 
            x-data="{
                setCategory(category){
                    this.$refs.category.value = category
                    this.$refs.cat_form.submit()
                }
            }">

                @if (request()->has('perPage'))
                    <input type="hidden" name="perPage" value="{{request('perPage')}}">
                @endif

                @if (request()->has('page'))
                    <input type="hidden" name="page" value="{{request('page')}}">
                @endif

                @if (request()->has('sort'))
                    <input type="hidden" name="sort" value="{{request('sort')}}">
                @endif

                @if (request()->has('search'))
                    <input type="hidden" name="search" value="{{request('search')}}">
                @endif

                <input type="hidden" x-ref="category" name="category">

                <button type="button" class="mx-1 my-1 button @if (!request()->has('category') || request('category') == '') active @endif" @click="setCategory('')" >All categories</button>

                @if (!empty($categories))
                    @foreach ($categories as $category)

                        <button type="button" class="mx-1 my-1 button @if (request()->has('category') && request('category') == $category->slug) active @endif" @click="setCategory('{{$category->slug}}')" >{{$category->title}}</button>
                    @endforeach
                @endif

            </form>
        </div>
    </nav>
@endif
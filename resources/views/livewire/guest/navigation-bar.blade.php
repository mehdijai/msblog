<section class="w-full shadow-lg"
    x-init = "init()"
    x-data="{
        open: false,
        init(){
            
            window.onscroll = function() {
                let mybutton = document.getElementById('to-top-btn')

                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    mybutton.classList.remove('hidden');
                    mybutton.classList.add('flex');
                } else {
                    mybutton.classList.remove('flex');
                    mybutton.classList.add('hidden');
                }
            };
        },
        goToTop(){
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    }">
    
    <nav class="relative z-20 w-full bg-white" role="navigation" 
        >
        <div class="container flex items-center p-3 mx-auto">
            <div class="mr-auto logo">
                <a href="{{route('home')}}" role="menuitem">
                    <x-jet-application-mark class="block h-6 md:h-8" />
                </a>
            </div>
    
            <div class="flex items-center justify-center p-0 m-0 md:hidden" role="menuitem" @click="open = !open">
                <span class="text-gray-900 transition-colors ease-in-out cursor-pointer material-icons-outlined duration-400 hover:text-golden-dark">
                    menu
                </span>
            </div>
            
            <div class="hidden p-0 m-0 md:block">
                <ul class="p-0 m-0">
                    @foreach ($menu_items as $link)
                        <li class="inline ml-0 md:ml-1">
                            <a  role="menuitem"
                                class="text-gray-900 text-sm font-semibold px-4 py-1 rounded-sm 
                                transition-all duration-500 ease-in-out
                                @if (request()->routeIs($link['route'])) active @else hover:bg-gray-100 hover:text-golden-dark  @endif
                                @if ($link['highlited']) bg-golden-light hover:bg-gray-100 hover:text-golden-dark  @endif"
                                href="{{$link['link']}}">
                                {{__($link['name'])}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    
        <div 
            x-show="open" 
            @click.outside="open = false"
            x-transition:enter="transition ease-out duration-400 origin-top"
            x-transition:enter-start="opacity-0 transform scale-y-0"
            x-transition:enter-end="opacity-100 transform scale-y-100"
            x-transition:leave="transition ease-in duration-400 origin-top"
            x-transition:leave-start="opacity-100 transform scale-y-100"
            x-transition:leave-end="opacity-0 transform scale-y-0"
            class="absolute block w-full p-3 bg-gray-50 shadow-inner-top md:hidden"
        >
            <ul class="flex flex-col items-start p-0 m-0">
                @foreach ($menu_items as $link)
                    <li class="w-full">
                        <a  role="menuitem"
                            class="px-2 py-2 text-center block border-2 border-gray-100 my-1 text-gray-900 bg-transparent text-sm font-semibold
                            transition-all duration-500 ease-in-out
                            @if (request()->routeIs($link['route'])) active @else hover:bg-gray-100 hover:text-golden-dark  @endif
                            @if ($link['highlited']) bg-golden-light hover:bg-gray-100 hover:text-golden-dark  @endif"
                            href="{{$link['link']}}">
                            {{__($link['name'])}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    
    <div id="to-top-btn" class="fixed z-20 items-center justify-center hidden p-1 transition-colors duration-500 ease-in-out rounded-full shadow-lg cursor-pointer bottom-5 right-5 bg-golden-dark hover:text-golden" @click="goToTop()">
        <span class="text-gray-100 material-icons-outlined">
            expand_less
        </span>
    </div>
</section>
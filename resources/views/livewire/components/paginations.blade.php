@if ($paginator->hasPages())

    <nav class="flex flex-wrap items-center px-2 py-4 text-center bg-white rounded-md md:flex-row">
        <div class="order-3 w-full py-3 md:order-none md:w-1/5 md:py-2 per-page-controller">
            <form method="get" class="flex flex-col items-center w-full 2xl:flex-row">

                @if (request()->has('page'))
                    <input type="hidden" name="page" value="{{request('page')}}">
                @endif

                @if (request()->has('sort'))
                    <input type="hidden" name="sort" value="{{request('sort')}}">
                @endif

                @if (request()->has('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                
                <label for="perPage" class="w-full mb-1 text-xs font-medium text-left text-gray-600 2xl:text-right 2xl:w-2/5 lg:mb-0">Posts per page: </label>

                <div class="w-full ml-0 text-left 2xl:ml-2 2xl:w-3/5">
                    <select required onchange="this.form.submit()" name="perPage" id="perPage" class="w-full px-2 text-sm bg-gray-100 border-none rounded-sm 2xl:w-20 focus:border-none focus:bg-gray-200">
                        <option @if (request()->has('perPage') && request('perPage') == 10) selected @endif value="10">10</option>
                        <option @if (request()->has('perPage') && request('perPage') == 20) selected @endif value="20">20</option>
                        <option @if (request()->has('perPage') && request('perPage') == 30) selected @endif value="30">30</option>
                    </select>
                </div>
            
            </form>
        </div>

        <div class="order-1 w-full py-3 md:order-none md:w-3/5 md:py-2 pagination-controller">
            <ul>

                {{-- Prev --}}
                @if ($paginator->onFirstPage())
                    <li class="inline p-0 m-0" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="button disabled" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="inline">
                        <a class="button" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_array($element))

                        @php
                            $current = $paginator->currentPage();
                            $last = $paginator->lastPage();
                            $doted_first = false;
                            $doted_last = false;
                        @endphp
                        

                        @foreach ($element as $page => $url)

                            @if ($page == $paginator->currentPage())
                                <li class="inline p-0 m-0" aria-current="page">
                                    <span class="button active">{{ $page }}</span>
                                </li>
                            @elseif (($page < $paginator->currentPage() - 1 && $page != 1))

                                @if(!$doted_first)
                                    <li class="inline p-0 m-0" aria-disabled="true">
                                        <span class="button disabled">...</span>
                                    </li>
                                @endif

                                @php
                                    $doted_first = true
                                @endphp

                            @elseif (($page > $paginator->currentPage() + 1 && $page != $last))

                                @if(!$doted_last)
                                    <li class="inline p-0 m-0" aria-disabled="true">
                                        <span class="button disabled">...</span>
                                    </li>
                                @endif

                                @php
                                    $doted_last = true
                                @endphp
                            @else
                                <li class="inline p-0 m-0" aria-current="page">
                                    <a class="button" href="{{ $url }}">{{$page}}</a>
                                </li>
                            @endif

                            
                        @endforeach
                    @endif
                @endforeach


                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="inline">
                        <a class="button" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="inline p-0 m-0" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="button disabled" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif

            </ul>
        </div>

        <div class="order-2 w-full py-3 md:order-none md:w-1/5 md:py-2 goto-controller">
            <form method="get" class="flex flex-col items-center w-full 2xl:flex-row">

                @if (request()->has('perPage'))
                    <input type="hidden" name="perPage" value="{{request('perPage')}}">
                @endif

                @if (request()->has('sort'))
                    <input type="hidden" name="sort" value="{{request('sort')}}">
                @endif

                @if (request()->has('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif

                <label for="page" class="w-full mb-1 text-xs font-medium text-left text-gray-600 2xl:w-2/5 2xl:mr-2 2xl:mb-0 2xl:text-right">Go to page: </label>
                <div class="flex w-full 2xl:w-3/5">
                    <input required name="page" type="number" min="1" max="{{$paginator->lastPage()}}" class="w-full px-2 text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200">
                    <button type="submit" class="px-3 py-2 ml-2 text-sm font-bold transition duration-300 ease-in-out rounded-md bg-golden-light bg-opacity-10 hover:bg-opacity-30 disabled:bg-gray-200 disabled:cursor-not-allowed">Go!</button>
                </div>
            </form>
        </div>
    </nav>
@endif
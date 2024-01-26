@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Parts</p>
            <a href="/part/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        <div class="flex justify-center items-center gap-4 mt-4">
            {{-- <form action="">
                <input type="text" class="shadow p-2 border border-2-black" placeholder="Search">
                <button type="submit" class="">
                    <a href="/part?page={{ $page - 1 }}&filter={{ $filter }}&order={{ $order }}" name="search"
                    class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                    Search</a>
                </button>
            </form> --}}
            <button>
                <a href="/part?page={{ $page - 1 }}&filter={{ $filter }}&order={{ $order }}" name="page"
                    class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                    << </a>
            </button>
            <button>
                <a href="/part?page={{ $page + 1 }}&filter={{ $filter }}&order={{ $order }}" name="page"
                    class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                    >>
                </a>
            </button>
        </div>

        <div class="flex justify-center flex-col">
            <div class="flex justify-center items-center flex-col">
                <div class="flex justify-center items-center flex-col">
                    <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                        <li class="flex justify-between items-center w-36">
                            <p>Part</p>
                            @if ($filter == 'name' && $order == 'desc')
                                <a href="/part?page=1&filter=name&order=asc">
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                </a>
                            @elseif ($filter == 'name' && $order == 'asc')
                                <a href="/part?page=1&filter=name&order=desc">
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                </a>
                            @else
                                <a href="/part?page=1&filter=name&order=asc">
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                </a>
                            @endif
                        </li>
                        <li class="flex justify-between items-center w-24">
                            <p>IPN</p>
                            @if ($filter == 'IPN' && $order == 'desc')
                                <a href="/part?page=1&filter=IPN&order=asc">
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                </a>
                            @elseif ($filter == 'IPN' && $order == 'asc')
                                <a href="/part?page=1&filter=IPN&order=desc">
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                </a>
                            @else
                                <a href="/part?page=1&filter=IPN&order=asc">
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                </a>
                            @endif
                        </li>
                        <li class="w-60">
                            <p>Description</p>
                        </li>
                        <li class="flex justify-between items-center w-36">
                            <p>Category</p>
                            @if ($filter == 'category' && $order == 'desc')
                                <a href="/part?page=1&filter=category&order=asc">
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                </a>
                            @elseif ($filter == 'category' && $order == 'asc')
                                <a href="/part?page=1&filter=category&order=desc">
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                </a>
                            @else
                                <a href="/part?page=1&filter=category&order=asc">
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                </a>
                            @endif
                        </li>
                        <li class="flex justify-between items-center w-40">

                            <p>Stock</p>
                            @if ($filter == 'in_stock' && $order == 'desc')
                                <a href="/part?page=1&filter=in_stock&order=asc">
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                </a>
                            @elseif ($filter == 'in_stock' && $order == 'asc')
                                <a href="/part?page=1&filter=in_stock&order=desc">
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                </a>
                            @else
                                <a href="/part?page=1&filter=in_stock&order=asc">
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                </a>
                            @endif

                        </li>
                        <li class="w-36">
                            <p>Price Range</p>
                        </li>
                        <li class="flex justify-between items-center w-36">
                            <p>Last Stocktake</p>
                            @if ($filter == 'last_stocktake' && $order == 'desc')
                                <a href="/part?page=1&filter=last_stocktake&order=asc">
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                </a>
                            @elseif ($filter == 'last_stocktake' && $order == 'asc')
                                <a href="/part?page=1&filter=last_stocktake&order=desc">
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                </a>
                            @else
                                <a href="/part?page=1&filter=last_stocktake&order=asc">
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                </a>
                            @endif
                        </li>
                    </ul>

                    {{-- Part row --}}
                    @foreach ($parts as $part)
                        <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200 text-sm">
                            <li class="w-36 text-blue-700 cursor-pointer break-words"><a
                                    href="/part/{{ $part->{'pk'} }}?page=1">{{ $part->{'full_name'} }}</a></li>
                            <li class="w-24 break-words">
                                @if ($part->{'IPN'} != null)
                                    {{ $part->{'IPN'} }}
                                @else
                                    -
                                @endif
                            </li>
                            <li class="w-60 break-words">{{ $part->{'description'} }}</li>
                            <li class="w-36 break-words text-sm">{{ $part->{'category'} }}</li>
                            <li class="w-40 flex justify-between gap-4 items-center break-words">
                                {{ $part->{'in_stock'} }}
                                @if ($part->{'unallocated_stock'} > 0)
                                    <p
                                        class="flex justify-center items-center rounded-xl bg-green-700 text-white text-xs p-1 font-bold">
                                        Available: {{ $part->{'unallocated_stock'} }}
                                    </p>
                                @endif
                            </li>
                            <li class="w-36 break-words">
                                @if ($part->{'pricing_min'} != null && $part->{'pricing_max'} != null)
                                    <p>${{ number_format($part->{'pricing_min'}, 2, '.', ',') }} -
                                        ${{ number_format($part->{'pricing_max'}, 2, '.', ',') }}</p>
                                @else
                                    -
                                @endif
                            </li>
                            <li class="w-36 break-words">
                                @if ($part->{'last_stocktake'} != null)
                                    {{ $part->{'last_stocktake'} }}
                                @else
                                    -
                                @endif
                            </li>
                        </ul>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

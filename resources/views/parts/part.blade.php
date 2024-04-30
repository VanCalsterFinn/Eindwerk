@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Parts</p>
            <form action="{{ route('part.view') }}" method="GET" class="flex items-center justify-between">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}"
                    class="mr-2 px-4 py-2 border border-gray-400 rounded focus:outline-none focus:border-blue-500">
                <select name="order_by"
                    class="mr-2 px-4 py-2 border border-gray-400 rounded focus:outline-none focus:border-blue-500">
                    <option value="name" {{ request('order_by') == 'name' ? 'selected' : '' }}>Part</option>
                    <option value="IPN" {{ request('order_by') == 'IPN' ? 'selected' : '' }}>IPN</option>
                    <option value="category" {{ request('order_by') == 'Category' ? 'selected' : '' }}>Category</option>
                    <option value="in_stock" {{ request('order_by') == 'in_stock' ? 'selected' : '' }}>Stock</option>
                    <option value="last_stocktake" {{ request('order_by') == 'last_stocktake' ? 'selected' : '' }}>Last
                        Stocktake</option>
                </select>
                <select name="order"
                    class="mr-2 px-4 py-2 border border-gray-400 rounded focus:outline-none focus:border-blue-500">
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply
                    Filter</button>
                <a href="{{ route('part.view') }}"
                    class="ml-2 px-4 py-2 border border-gray-400 rounded text-gray-700 hover:text-gray-900">Remove All
                    Filters</a>
            </form>
            <a href="/part/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>



        <div class="flex justify-center flex-col">
            <div class="flex justify-center items-center flex-col">
                {{-- This is the header container for the custom table --}}
                <div class="flex justify-center items-center flex-col">
                    <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                        <li class="flex justify-between items-center w-36">
                            <p>Part</p>
                            @if ($order_by == 'name' && $order == 'desc')
                                <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                            @elseif ($order_by == 'name' && $order == 'asc')
                                <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                            @else
                                <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                            @endif
                        </li>
                        <li class="flex justify-between items-center w-24">
                            <p>IPN</p>
                            @if ($order_by == 'IPN' && $order == 'desc')
                                <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                            @elseif ($order_by == 'IPN' && $order == 'asc')
                                <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                            @else
                                <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                            @endif
                        </li>
                        <li class="w-60">
                            <p>Description</p>
                        </li>
                        <li class="flex justify-between items-center w-36">
                            <p>Category</p>
                            @if ($order_by == 'category' && $order == 'desc')
                                <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                            @elseif ($order_by == 'category' && $order == 'asc')
                                <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                            @else
                                <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                            @endif
                        </li>
                        <li class="flex justify-between items-center w-40">

                            <p>Stock</p>
                            @if ($order_by == 'in_stock' && $order == 'desc')
                                <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                            @elseif ($order_by == 'in_stock' && $order == 'asc')
                                <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                            @else
                                <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                            @endif

                        </li>
                        <li class="w-36">
                            <p>Price Range</p>
                        </li>
                        <li class="flex justify-between items-center w-36">
                            <p>Last Stocktake</p>
                            @if ($order_by == 'last_stocktake' && $order == 'desc')
                                <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                            @elseif ($order_by == 'last_stocktake' && $order == 'asc')
                                <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                            @else
                                <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                            @endif
                        </li>
                    </ul>

                    {{-- Part row --}}

                    <!-- Display paginated items -->
                    @if ($paginator->count() > 0)
                        @foreach ($paginator as $part)
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
                        <!-- Display pagination links -->
                        <div class="flex justify-center items-center w-full py-4 ">
                            {{ $paginator->links() }}
                        </div>
                    @else
                        <p>No items found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

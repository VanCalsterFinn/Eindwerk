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

        {{-- Parts table view --}}
        <div class="flex justify-center flex-col items-center px-4 sm:px-8 max-w-3xl my-8 min-w-full rounded-lg">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justify-between items-center">
                                <p>Part</p>
                                @if ($order_by == 'name' && $order == 'desc')
                                    <img src="/icons8-sort-down-30.png" alt="" class="ml-4 w-6 h-6">
                                @elseif ($order_by == 'name' && $order == 'asc')
                                    <img src="/icons8-sort-up-30.png" alt="" class="ml-4 w-6 h-6">
                                @else
                                    <img src="/icons8-sort-48.png" alt="" class="ml-4 w-6 h-6">
                                @endif
                            </div>
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justiy-between items-center">
                                <p>IPN</p>
                                @if ($order_by == 'IPN' && $order == 'desc')
                                    <img src="/icons8-sort-down-30.png" alt="" class="ml-4 w-6 h-6">
                                @elseif ($order_by == 'IPN' && $order == 'asc')
                                    <img src="/icons8-sort-up-30.png" alt="" class="ml-4 w-6 h-6">
                                @else
                                    <img src="/icons8-sort-48.png" alt="" class="ml-4 w-6 h-6">
                                @endif
                            </div>
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            style="min-width: 120px;">
                            <div class="flex justiy-between items-center">
                                Description
                            </div>
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justiy-between items-center">
                                <p>Category</p>
                                @if ($order_by == 'category' && $order == 'desc')
                                    <img src="/icons8-sort-down-30.png" alt="" class="ml-4 w-6 h-6">
                                @elseif ($order_by == 'category' && $order == 'asc')
                                    <img src="/icons8-sort-up-30.png" alt="" class="ml-4 w-6 h-6">
                                @else
                                    <img src="/icons8-sort-48.png" alt="" class="ml-4 w-6 h-6">
                                @endif
                            </div>
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justiy-between items-center">
                                <p>Stock</p>
                                @if ($order_by == 'in_stock' && $order == 'desc')
                                    <img src="/icons8-sort-down-30.png" alt="" class="ml-4 w-6 h-6">
                                @elseif ($order_by == 'in_stock' && $order == 'asc')
                                    <img src="/icons8-sort-up-30.png" alt="" class="ml-4 w-6 h-6">
                                @else
                                    <img src="/icons8-sort-48.png" alt="" class="ml-4 w-6 h-6">
                                @endif
                            </div>
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justiy-between items-center">
                                Price Range
                            </div>
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-slate-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex justiy-between items-center">
                                <p>Last Stocktake</p>
                                @if ($order_by == 'last_stocktake' && $order == 'desc')
                                    <img src="/icons8-sort-down-30.png" alt="" class="w-6 h-6">
                                @elseif ($order_by == 'last_stocktake' && $order == 'asc')
                                    <img src="/icons8-sort-up-30.png" alt="" class="w-6 h-6">
                                @else
                                    <img src="/icons8-sort-48.png" alt="" class="w-6 h-6">
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($paginator->count() > 0)
                        @foreach ($paginator as $part)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="/part/{{ $part->{'pk'} }}?page=1">{{ $part->{'full_name'} }}</a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($part->{'IPN'} != null)
                                        {{ $part->{'IPN'} }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $part->description }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $part->category }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $part->{'in_stock'} }}
                                    @if ($part->{'unallocated_stock'} > 0)
                                        <p
                                            class="flex justify-center items-center rounded-xl bg-green-700 text-white text-xs p-1 font-bold">
                                            Available: {{ $part->{'unallocated_stock'} }}
                                        </p>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($part->{'pricing_min'} != null && $part->{'pricing_max'} != null)
                                        <p>${{ number_format($part->{'pricing_min'}, 2, '.', ',') }} -
                                            ${{ number_format($part->{'pricing_max'}, 2, '.', ',') }}</p>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($part->{'last_stocktake'} != null)
                                        {{ $part->{'last_stocktake'} }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>No items found.</p>
                    @endif
                </tbody>
            </table>
            <div class="mt-4">
                {{ $paginator->links() }} <!-- Laravel pagination links -->
            </div>
        </div>
    </div>
@endsection

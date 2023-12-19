@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Inventory</p>
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
                <div class="flex justify-center items-center flex-col">
                    <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                        <li class="w-36">Part</li>
                        <li class="w-24">IPN</li>
                        <li class="w-60">Description</li>
                        <li class="w-36">Category</li>
                        <li class="w-36">Stock</li>
                        <li class="w-36">Price Range</li>
                        <li class="w-36">Last Stockage</li>
                    </ul>
                    {{-- Part row --}}
                    @foreach ($parts as $part)
                        <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                            <li class="w-36 text-blue-700 cursor-pointer break-words"><a
                                    href="/part/{{ $part->{'pk'} }}">{{ $part->{'full_name'} }}</a></li>
                            <li class="w-24 break-words">
                                @if ($part->{'IPN'} != null)
                                    {{ $part->{'IPN'} }}
                                @else
                                    -
                                @endif
                            </li>
                            <li class="w-60 break-words">{{ $part->{'description'} }}</li>
                            <li class="w-36 break-words text-sm">{{ $part->{'category'} }}</li>
                            <li class="w-36 flex justify-between gap-4 items-center break-words">
                                {{ $part->{'in_stock'} }} 
                                @if ($part->{'required_for_build_orders'} > 0)
                                    <p class="flex justify-center items-center rounded-xl bg-green-700 text-white text-xs p-1 font-bold">
                                        Building: {{ $part->{'required_for_build_orders'} }}
                                    </p>
                                @endif
                            </li>
                            <li class="w-36 break-words">
                                @if ($part->{'pricing_min'} != null && $part->{'pricing_max'} != null)
                                    <p>${{ number_format($part->{'pricing_min'}, 2, '.', ',') }} - ${{ number_format($part->{'pricing_max'}, 2, '.', ',') }}</p>
                                @else
                                    -
                                @endif
                            </li>
                            <li class="w-36 break-words">{{ $part->{'last_stocktake'} }}</li>
                        </ul>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

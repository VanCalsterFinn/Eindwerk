@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Part: {{ $part->{"full_name"} }}</p>
        </div>
        <div class="flex justify-center flex-col">
            <div class="flex justify-center flex-col shadow rounded p-4">
                {{-- <img class="w-36 h-36 object-cover shadow mb-4" src="/electrolytic-capacitor.jpg" alt="img"> --}}
                <div class="flex justify-center items-center gap-4">
                    <div class="flex justify-center flex-col gap-4">
                        <p class="font-bold">Part: </p>
                        <p class="font-bold">In Stock: </p>
                        <p class="font-bold">On Order: </p>
                        <p class="font-bold">Creation Date: </p>
                        <p class="font-bold">Last Stocktake: </p>
                        <p class="font-bold">Description: </p>
                    </div>
                    <div class="flex justify-center flex-col gap-4">
                        <p>{{ $part->{"full_name"} }}</p>
                        <p>{{ $part->{"in_stock"} }}</p>
                        <p>{{ $part->{"ordering"} }}</p>
                        {{-- <p class="flex justify-center items-center bg-green-700 rounded-2xl p-1 text-white w-10">OK</p> --}}
                        <p>{{ $part->{"creation_date"} }}</p>
                        <p>
                            @if ($part->{"last_stocktake"} != null)
                                {{ $part->{"last_stocktake"} }}
                            @else
                                -
                            @endif

                        </p>
                        <p>{{ $part->{"description"} }}</p>
                    </div>
                </div>

            </div>


            {{-- Part Stock Banner --}}
            <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
                <h1 class="text-xl font-bold ">Part Stock</h1>
                <a href="/part/{{ $part->{"pk"} }}/add"><button class="p-1 bg-blue-700 text-white cursor-pointer rounded">Add Stock Item</button></a>
            </div>  

            <div class="flex justify-center items-center flex-col">
                <table class="w-full">
                    <tr class="bg-blue-200">
                        <th class="w-32">Part</th>
                        <th class="w-16">IPN</th>
                        <th class="w-32">Description</th>
                        <th class="w-24">Stock</th>
                        <th class="w-16">Status</th>
                        <th class="w-32">Batch</th>
                        <th class="w-32">Location</th>
                        <th class="w-32">Stocktake</th>
                        <th class="w-32">Expiry date</th>
                        <th class="w-32">Last Updated</th>
                        <th class="w-32">Purchase Price</th>
                        <th class="w-24">Packaging</th>
                    </tr>
                    @foreach ($stocks as $stock)
                        <tr class="p-3 border-b border-slate-200 text-sm">
                            {{-- Part --}}
                            <td class="text-center">
                                <a href="/part/{{ $stock->{'part'} }}?page=1">{{ $part->{'full_name'} }}</a>
                            </td>
                            {{-- IPN --}}
                            <td class="text-center">
                                @if ($part->{'IPN'} != null)
                                    {{ $part->{'IPN'} }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- Description --}}
                            <td class="text-center">
                                {{ $part->{'description'} }}
                            </td>
                            {{-- Stock --}}
                            <td class="text-center">
                                {{ $stock->{'quantity'} }}
                            </td>
                            {{-- Status --}}
                            <td class="text-center">
                                <p class="text-center w-10 rounded-xl bg-green-700 text-white p-1 font-bold w-full h-full">
                                    {{ $stock->{'status_text'} }}
                                </p>
                            </td>
                            {{-- Batch --}}
                            <td class="text-center">
                                @if ($stock->{'batch'} != null)
                                    {{ $stock->{'batch'} }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- Location --}}
                            <td class="text-center">
                                {{ $stock->{'location'} }}
                            </td>
                            {{-- Stocktake --}}
                            <td class="text-center">
                                @if ($stock->{'stocktake_date'} != null)
                                    {{ $stock->{'stocktake_date'} }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- Expiry Date --}}

                            <td class="text-center">
                                @if ($stock->{'expiry_date'} != null)
                                    {{ $stock->{'expiry_date'} }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- Last Updated --}}
                            <td class="text-center">
                                {{ $stock->{'updated'} }}
                            </td>
                            {{-- Purchase Price --}}
                            <td class="text-center">
                                @if ($stock->{'purchase_price'} != null)
                                    {{ $stock->{'purchase_price'} }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- Packaging --}}
                            <td class="text-center">
                                @if ($stock->{'packaging'} != null)
                                    {{ $stock->{'packaging'} }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if ($stocks == null)
                    <p class="mt-4">No records have been found!</p>
                @endif
            </div>
        </div>

    </div>
@endsection

@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Part: {{ $part->{"full_name"} }}</p>
        <a href="/inventory/1/edit" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
    <div class="flex justify-center flex-col">
        <div class="flex justify-center flex-col shadow rounded p-4">

            <img class="w-36 h-36 object-cover shadow mb-4" src="/electrolytic-capacitor.jpg" alt="img">

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
                    <p>{{ $part->{"last_stocktake"} }}</p>
                    <p>{{ $part->{"description"} }}</p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
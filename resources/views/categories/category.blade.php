@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')

<div class="flex justify-center items-center flex-col w-full">

    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Category</p>
        <a href="/category/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>

    <div class="flex justify-center flex-col">
        <div class="flex justify-center items-center flex-col">
    
            <div class="flex justify-center items-center flex-col">
    
                <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                    <li class="w-24">Name</li>
                    <li class="w-60">Description</li>
                    <li class="w-24">Parts</li>
                </ul>
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24">Connectors</li>
                    <li class="w-60">Connectors, pin headers, etc...</li>
                    <li class="w-24">2</li>
                </ul>
                
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24">Interface</li>
                    <li class="w-60">Drivers, Receivers, Transceiver</li>
                    <li class="w-24">44</li>
                </ul>
    
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24">Capacitors</li>
                    <li class="w-60">Capacitors</li>
                    <li class="w-24">13</li>
                </ul>
            </div>
    
        </div>
    </div>
</div>

@endsection
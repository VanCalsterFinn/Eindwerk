@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        {{-- BOM banner --}}
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Bill of Material</p>
            <a href="/bill_of_material/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>

        <div class="flex flex-col">
            {{-- Build orders table --}}
            <div class="flex justify-center items-center flex-col">
                <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                    <li class="w-24">Name</li>
                    <li class="w-60">Build Description</li>
                    <li class="w-24">Parts</li>
                </ul>
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/bill_of_material/1">BO0002</a></li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24">24</li>
                </ul>

                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/bill_of_material/1">BO0002</a></li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24">5</li>
                </ul>

                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/bill_of_material/1">BO0002</a></li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24">11</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@extends('layouts.topbar')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        {{-- Build orders banner --}}
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Build Orders</p>
            <a href="/build_orders/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
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
                    <li class="w-24">Quantity</li>
                    <li class="w-60">Build Description</li>
                    <li class="w-24">Status</li>
                    <li class="w-24">Completed</li>
                </ul>
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/build_orders/1">BO0002</a></li>
                    <li class="w-24">5</li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24 flex justify-center items-center bg-blue-700 rounded-2xl p-1 text-white w-10">Production
                    </li>
                    <li class="w-24">0 / 5</li>
                </ul>

                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer">BO0002</li>
                    <li class="w-24">5</li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24 flex justify-center items-center bg-blue-700 rounded-2xl p-1 text-white w-10">Production
                    </li>
                    <li class="w-24">0 / 5</li>
                </ul>

                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer">BO0002</li>
                    <li class="w-24">5</li>
                    <li class="w-60">Board assembly</li>
                    <li class="w-24 flex justify-center items-center bg-blue-700 rounded-2xl p-1 text-white w-10">Production
                    </li>
                    <li class="w-24">0 / 5</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

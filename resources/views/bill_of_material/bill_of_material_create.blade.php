@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        {{-- Create build order banner --}}
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Create BOM</p>
        </div>

        <div class="flex justify-center items-center flex-col p-4 w-full">
            {{-- Build order form --}}
            <div class="flex justify-center flex-col shadow p-4 rounded w-1/2">
                <form action="/bill_of_material" method="PUT">
                    <div class="flex justify-center flex-col items-center gap-4">
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Name </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Image</p>
                            <input type="file" class="border-2 border-slate-200 rounded">
                        </div>
                    </div>
                    {{-- Required part addition --}}
                    <div class="flex justify-center items-center gap-4 mt-4">
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Required Parts</p>
                            <select name="" id="" class="border-2 border-slate-200 rounded">
                                <option value="">Base part 1</option>
                                <option value="">Base part 2</option>
                                <option value="">Base part 3</option>
                                <option value="">Base part 4</option>
                                <option value="">Base part 5</option>
                            </select>
                        </div>
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Quantity per</p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex mt-4 hover:opacity-80">
                            <button class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded" onclick="addItem()">Add</button>
                        </div>
                    </div>
                    {{-- Required part table --}}
                    <div class="flex flex-col w-full mt-4">
                        {{-- required parts row --}}
                        <div class="flex justify-between items-center border-b-2 border-slate-700 font-bold">
                            {{-- select all checkbox --}}
                            <p class="py-2 w-60">Required Parts</p>
                            <p class="py-2 w-24">Quantity Per</p>
                            <p class="py-2 w-48">Actions</p>
                        </div>
                        <div class="flex justify-between items-center border-b-2 border-slate-200">
                            <p class="py-2 w-60">C_100nF_D603</p>
                            <p class="py-2 w-24">5</p>
                            <p class="py-2 w-48 flex gap-4 cursor-pointer">
                                <a onclick="return confirm('Are you sure you want to delete this item?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="red">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </p>
                        </div>
                        <div class="flex justify-between items-center border-b-2 border-slate-200">
                            <p class="py-2 w-60">C_100nF_D603</p>
                            <p class="py-2 w-24">5</p>
                            <p class="py-2 w-48 flex gap-4 cursor-pointer">
                                <a onclick="return confirm('Are you sure you want to delete this item?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="red">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </p>
                        </div>
                        <div class="flex justify-between items-center border-b-2 border-slate-200">
                            <p class="py-2 w-60">C_100nF_D603</p>
                            <p class="py-2 w-24">5</p>
                            <p class="py-2 w-48 flex gap-4 cursor-pointer">
                                <a onclick="return confirm('Are you sure you want to delete this item?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="red">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="flex mt-4 hover:opacity-80">
                        <input type="submit" value="Create" id="create"
                            class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

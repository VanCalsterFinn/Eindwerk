@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        {{-- Build order banner --}}
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-xl">Build Order BO0002</p>
            <a href="" class="bg-blue-700 text-white p-2 rounded">Complete Build</a>
        </div>

        {{-- Build order info card --}}
        <div class="flex flex-wrap p-4 gap-4 shadow">
            <img class="w-64 h-64 object-cover border-2 border-black" src="/pcb.jpg" alt="img">
            <div class="flex flex-col gap-4 w-80">
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Part: </p>
                    <p>002.01-PCBA | Widget Board</p>
                </div>
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Quantity: </p>
                    <p>5</p>
                </div>
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Build Description: </p>
                    <p>Board assembly</p>
                </div>
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Status: </p>
                    <p class="flex justify-center items-center bg-blue-700 rounded-2xl p-1 text-white w-24">Production</p>
                </div>
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Completed: </p>
                    <p>0 / 5</p>
                </div>
                <div class="flex justify-between items-center p-2 border-b-2 border-slate-200">
                    <p class="font-bold">Issued By: </p>
                    <p>admin</p>
                </div>

            </div>
        </div>

        {{-- Allocate stock banner --}}
        <div class="flex justify-center items-center flex-col w-full p-4 bg-slate-100">
            <div class="flex justify-between w-full">
                <p class="font-bold text-xl">Allocate Stock to Build</p>
                <div class="flex justify-center items-center gap-2">
                    <a href="" class="bg-red-700 text-white p-2 rounded">Unallocate Stock</a>
                    <a href="" class="bg-blue-700 text-white p-2 rounded">Allocate Stock</a>
                </div>
            </div>
        </div>

        {{-- Required parts table --}}
        <div class="flex flex-col w-full">
            <div class="flex justify-around items-center border-b-2 border-slate-700 font-bold">
                {{-- select all checkbox --}}
                <input type="checkbox" name="part_name" id="select_all_checkbox" class="py-2 w-16">
                <p class="py-2 w-60">Required Part</p>
                <p class="py-2 w-60">Reference</p>
                <p class="py-2 w-24">Quantity Per</p>
                <p class="py-2 w-16">Available</p>
                <p class="py-2 w-24">Allocated</p>
                <p class="py-2 w-48">Actions</p>
            </div>

            {{-- required parts row --}}
            <div class="flex justify-around items-center border-b-2 border-slate-200">
                <input type="checkbox" name="part_name" id="part_id" class="py-2 w-16">
                <p class="py-2 w-60">C_100nF_D603</p>
                <p class="py-2 w-60">C1, C2, C5, C9, C12</p>
                <p class="py-2 w-24">5</p>
                <p class="py-2 w-16">2000</p>
                <p class="py-2 w-24">0 / 25</p>
                <p class="py-2 w-48 flex gap-4 cursor-pointer">
                    <a href="/orders">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1d4ed8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </a>
                    <a onclick="return confirm('Are you sure you want to delete this item?')" href="/build_order/1/delete_required_part">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </p>
            </div>

            <div class="flex justify-around items-center border-b-2 border-slate-200">
                <input type="checkbox" name="part_name" id="part_id" class="py-2 w-16">
                <p class="py-2 w-60">C_100nF_D603</p>
                <p class="py-2 w-60">C1, C2, C5, C9, C12</p>
                <p class="py-2 w-24">5</p>
                <p class="py-2 w-16">2000</p>
                <p class="py-2 w-24">0 / 25</p>
                <p class="py-2 w-48 flex gap-4 cursor-pointer">
                    <a href="/orders">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1d4ed8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </a>
                    <a onclick="return confirm('Are you sure you want to delete this item?')" href="/build_order/1/delete_required_part">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </p>
            </div>

            <div class="flex justify-around items-center border-b-2 border-slate-200">
                <input type="checkbox" name="part_name" id="part_id" class="py-2 w-16">
                <p class="py-2 w-60">C_100nF_D603</p>
                <p class="py-2 w-60">C1, C2, C5, C9, C12</p>
                <p class="py-2 w-24">5</p>
                <p class="py-2 w-16">2000</p>
                <p class="py-2 w-24">0 / 25</p>
                <p class="py-2 w-48 flex gap-4 cursor-pointer">
                    <a href="/orders">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1d4ed8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </a>
                    <a onclick="return confirm('Are you sure you want to delete this item?')" href="/build_order/1/delete_required_part">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </p>
            </div>

        </div>

    </div>
@endsection

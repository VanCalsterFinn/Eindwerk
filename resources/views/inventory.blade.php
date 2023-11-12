@extends('layouts.app')
@extends('layouts.topbar')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-center flex-col">

        <div class="flex justify-between items-center w-full mb-4">
            <p class="font-bold text-2xl">Inventory</p>
            <a href="/inventory/create" class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>


        <div class="flex justify-center items-center flex-col">
    
            {{-- <div class="flex justify-center items-center border-2 border-slate-200 rounded-2xl px-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#334155">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                <input type="text" class="py-1 px-3 focus:outline-none" placeholder="Search for an item">
            </div> --}}
    
            <div class="flex justify-center items-center flex-col">
    
                <ul class="flex justify-between items-center gap-14 p-3 mt-4 bg-blue-200 rounded font-bold">
                    <li class="w-24">Part</li>
                    <li class="w-24">Status</li>
                    <li class="w-24">Category</li>
                    <li class="w-24">Location</li>
                    <li class="w-24">Stock</li>
                    <li class="w-24">Packaging</li>
                    <li class="w-24">Action</li>
                </ul>
                <ul class="flex justify-between items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24"><input type="text" class="w-24 border-2 border-black rounded"></li>
                    <li class="w-24">
                        <select name="status_id" id="">
                            <option>OK</option>
                            <option>Attention needed</option>
                            <option>Bad</option>
                        </select>
                    </li>
                    <li class="w-24">
                        <select name="category_id" id="">
                            <option>Connectors</option>
                            <option>Interface</option>
                            <option>MCU</option>
                            <option>Capacitor</option>
                            <option>Inductors</option>
                            <option>Relais</option>
                            <option>PCB</option>
                            <option>PCBA</option>
                        </select>
                    </li>
                    <li class="w-24"><input type="text" class="w-24 border-2 border-black rounded"></li>
                    <li class="w-24"><input type="text" class="w-24 border-2 border-black rounded"></li>
                    <li class="w-24"><input type="text" class="w-24 border-2 border-black rounded"></li>
                    <li class="w-24">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#334155">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                </ul>
    
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/inventory/1">2309124589</a></li>
                    <li class="w-24">
                        <p class="flex justify-center items-center bg-green-700 rounded-2xl p-1 text-white w-10">OK</p>
                    </li>
                    <li class="w-24">Resistor</li>
                    <li class="w-24">R1S2</li>
                    <li class="w-24">1235</li>
                    <li class="w-24">Reel</li>
                    <li class="w-24 cursor-pointer">
                        <div class="flex items-center gap-2">
                            <a href="/inventory/1/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1d4ed8">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a onclick="return confirm('Are you sure you want to delete this item?')" href="/inventory/1/delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
                
                <ul class="flex justify-center items-center gap-14 p-3 border-b border-slate-200">
                    <li class="w-24 text-blue-700 cursor-pointer"><a href="/inventory/1">2309124589</a></li>
                    <li class="w-24">
                        <p class="flex justify-center items-center bg-green-700 rounded-2xl p-1 text-white w-10">OK</p>
                    </li>
                    <li class="w-24">Resistor</li>
                    <li class="w-24">R1S4</li>
                    <li class="w-24">4234</li>
                    <li class="w-24">Reel</li>
                    <li class="w-24 cursor-pointer">
                        <div class="flex items-center gap-2">
                            <a href="/inventory/1/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1d4ed8">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a onclick="return confirm('Are you sure you want to delete this item?')" href="/inventory/1/delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
    
            </div>
    
        </div>
    </div>
</div>

@endsection
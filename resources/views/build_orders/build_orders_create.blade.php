@extends('layouts.app')
@extends('layouts.topbar')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    {{-- Create build order banner --}}
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Create Build Order</p>
    </div>

    <div class="flex justify-center flex-col p-4">
        {{-- Build order form --}}
        <div class="flex justify-center flex-col shadow p-4 rounded">
            <form action="/build_order" method="PUT">
                <div class="flex justify-center items-center gap-4">

                    <div class="flex justify-center flex-col">

                        <div class="flex justify-between items-center gap-4">
                            <p class="font-bold">Build Order: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>

                    </div>
                </div>
                <div class="flex mt-4 hover:opacity-80">
                    <input type="submit" value="Add" id="add" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                </div>
            </form>
        </div>

    </div>

</div>

@endsection
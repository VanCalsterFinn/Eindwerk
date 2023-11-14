@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    {{-- Create build order banner --}}
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Create Build Order</p>
    </div>

    <div class="flex justify-center items-center flex-col p-4 w-full">
        {{-- Build order form --}}
        <div class="flex justify-center flex-col shadow p-4 rounded w-1/2">
            <form action="/build_order" method="PUT">
                <div class="flex justify-center items-center gap-4">
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Base part</p>
                            <select name="" id="" class="border-2 border-slate-200 rounded">
                                <option value="">Base part 1</option>
                                <option value="">Base part 2</option>
                                <option value="">Base part 3</option>
                                <option value="">Base part 4</option>
                                <option value="">Base part 5</option>
                            </select>
                        </div>
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Quantity </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">References </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-center flex-col gap-1 w-full">
                            <p class="font-bold">Notes </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
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
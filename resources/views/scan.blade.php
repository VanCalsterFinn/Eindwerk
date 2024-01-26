@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Scan Barcode</p>
    </div>
    <form name="barcode_form" id="barcode_form" method="POST" action="/category/create" class="w-1/2" onchange="barcode_scan()">
        @csrf 
        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="barcode">Barcode</label>
            <input name="barcode" type="text" id="barcode" placeholder="Scan barcode data here using barcode scanner" class="@error('barcode') is-invalid @enderror shadow" autofocus>
            @error('barcode')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
    </form>
</div>

@endsection
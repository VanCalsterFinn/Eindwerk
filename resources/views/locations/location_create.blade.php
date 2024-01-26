@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Create Location</p>
    </div>
    <form method="POST" action="/location/create" class="w-1/2">
        @csrf 
        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="name">Name *</label>
            <input name="name" type="text" id="name" placeholder="Name of the location (no special characters)" class="@error('name') is-invalid @enderror shadow">
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="description">Description</label>
            <input name="description" type="text" id="description" placeholder="Description of the location" class="@error('description') is-invalid @enderror shadow">
            @error('description')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="flex mt-4 hover:opacity-80 form-group">
            <input type="submit" value="Submit" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
        <p class="font-bold text-2xl">Create Part</p>
    </div>
    <form method="POST" action="/part/create" class="w-1/2">
        @csrf 
        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="category">Category *</label>
            <select name="category" id="category" class="@error('category') is-invalid @enderror shadow">
                @foreach ($categories as $category)
                    <option value="{{ $category->{"pk"} }}">{{ $category->{"name"} }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="name">Name *</label>
            <input name="name" type="text" id="name" class="@error('name') is-invalid @enderror shadow">
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="ipn">IPN</label>
            <input name="ipn" type="text" id="ipn" placeholder="Internal Part Number" class="@error('ipn') is-invalid @enderror shadow">
            @error('ipn')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="revision">Revision</label>
            <input name="revision" type="text" id="revision" placeholder="Part revision or version number"  class="@error('revision') is-invalid @enderror shadow">
            @error('revision')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="description">Description</label>
            <input name="description" type="text" id="description" class="@error('description') is-invalid @enderror shadow">
            @error('description')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="units">Units</label>
            <input name="units" type="text" id="units" placeholder="Units of measure for this part" class="@error('units') is-invalid @enderror shadow">
            @error('units')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="link">Link</label>
            <input name="link" type="text" id="link" placeholder="Link to external URL" class="@error('link') is-invalid @enderror shadow">
            @error('link')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="default_location">Default Location</label>
            <select name="default_location" id="default_location" class="@error('default_location') is-invalid @enderror shadow">
                @foreach ($locations as $location)
                    <option value="{{ $location->{"pk"} }}">{{ $location->{"name"} }}</option>
                @endforeach
            </select>            
            @error('default_location')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="default_expiry">Default Expiry *</label>
            <input name="default_expiry" type="text" id="default_expiry" value="0" placeholder="Expiry time (in days) for stock items of this part" class="@error('default_expiry') is-invalid @enderror shadow">
            @error('default_expiry')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
            <div class="flex items-center gap-4">
                <label for="max_expiry">Max expiry?</label>
                <input type="checkbox" name="max_expiry">
            </div>
        </div>

        <div class="flex justify-center flex-col mt-4 form-group">
            <label for="min_stock">Minimum Stock *</label>
            <input name="min_stock" type="text" id="min_stock" value="0" class="@error('min_stock') is-invalid @enderror shadow">
            @error('min_stock')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="flex mt-4 hover:opacity-80 form-group">
            <input type="submit" value="Submit" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
        </div>
    </form>
</div>

@endsection
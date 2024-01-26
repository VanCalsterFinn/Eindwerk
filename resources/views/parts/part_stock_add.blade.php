@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-between items-center p-4 bg-slate-100 w-full">
            <p class="font-bold text-2xl">Add Stock</p>
        </div>
        <form method="POST" action="/part/{{ $part->{'pk'} }}/add" class="w-1/2">
            @csrf 
            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="part">Part *</label>
                <input name="part" type="text" value="{{ $part->{"full_name"}." - ".$part->{"description"} }}" id="part" class="@error('part') is-invalid @enderror shadow" @readonly(true)>
                @error('part')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="supplier_part">Supplier part</label>
                <input name="supplier_part" type="text" id="supplier_part" class="@error('supplier_part') is-invalid @enderror shadow">
                @error('supplier_part')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="location">Stock Location</label>
                <select name="location" id="location" class="@error('supplier_part') is-invalid @enderror shadow">
                    @foreach ($locations as $location)
                        <option value="{{ $location->{"pk"} }}">{{ $location->{"name"} }}</option>
                    @endforeach
                </select>
                @error('location')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="quantity">Quantity *</label>
                <input name="quantity" type="text" value="1" id="quantity"  class="@error('quantity') is-invalid @enderror shadow">
                @error('quantity')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="batch_code">Batch Code</label>
                <input name="batch_code" type="batch_code" id="batch_code" value="{{ $todayDate }}" class="@error('batch_code') is-invalid @enderror shadow">
                @error('batch_code')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="status">Status *</label>
                <select name="status" id="status" class="@error('status') is-invalid @enderror shadow">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->{"key"} }}">{{ $status->{"label"} }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="expiry_date">Expiry Date</label>
                <input name="expiry_date" type="date" id="expiry_date" class="@error('expiry_date') is-invalid @enderror shadow">
                @error('expiry_date')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="purchase_price">Purchase Price</label>
                <input name="purchase_price" type="text" id="purchase_price" class="@error('purchase_price') is-invalid @enderror shadow">
                @error('purchase_price')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="currency">Currency *</label>
                <select name="currency" id="currency" class="@error('currency') is-invalid @enderror shadow">
                    <option value="EUR">Euro</option>
                    <option value="USD">US Dollar</option>
                    <option value="GBP">British Pound</option>
                    <option value="AUD">Australian Dollar</option>
                    <option value="CAD">Canadian Dollar</option>
                    <option value="CNY">Chinese Yuan</option>
                    <option value="JPY">Japanese Yen</option>
                    <option value="NZD">New Zealand Dollar</option>
                </select>
                @error('currency')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center flex-col mt-4 form-group">
                <label for="packaging">Packaging</label>
                <input name="packaging" type="text" id="packaging" class="@error('packaging') is-invalid @enderror shadow">
                @error('packaging')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="flex mt-4 hover:opacity-80 form-group">
                <input type="submit" value="Submit" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
            </div>
        </form>
    </div>

@endsection

@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.location_banner')
@section('content')
    <div class="flex justify-center items-center flex-col w-full">
        <div class="flex justify-center items-center flex-col w-1/2 p-4 shadow">
            <p class="text-2xl font-bold">Login</p>
            <form method="POST" action="login">
                @csrf 
                <div class="flex justify-center flex-col mt-4 form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="@error('username') is-invalid @enderror shadow">
                    @error('username')
                        <div class="text-red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-center flex-col mt-4 form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="@error('password') is-invalid @enderror shadow">
                    @error('password')
                        <div class="text-red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex mt-4 hover:opacity-80 form-group">
                    <input type="submit" value="Login" id="login" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                </div>
            </form>
            {{-- <div class="flex justify-center items-center mt-2">
                <p class="text-sm">Don't have an account? <a href="{{ url('register') }}" class="text-blue-700 cursor-pointer">Register here</a> </p>
            </div> --}}
        </div>
    </div>
@endsection
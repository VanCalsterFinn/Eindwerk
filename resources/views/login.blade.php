<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
    <div class="flex justify-center items-center flex-col">
        <div class="flex justify-center items-center flex-col w-1/2 p-4 shadow">
            <p class="text-2xl font-bold">Login</p>
            <form method="GET" action="/dashboard">
                @csrf 
                
                <div class="flex justify-center flex-col mt-4">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="@error('username') is-invalid @enderror shadow">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-center flex-col mt-4">
                    <label for="password">Password</label>
                    <input id="password" type="text" class="@error('password') is-invalid @enderror shadow">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex mt-4 hover:opacity-80">
                    <input type="submit" value="Login" id="login" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                </div>
            </form>

            <div class="flex justify-center items-center mt-2">
                <p class="text-sm">Don't have an account? <a href="{{ url('register') }}" class="text-blue-700 cursor-pointer">Register here</a> </p>
            </div>
        </div>
    </div>
</body>
</html>
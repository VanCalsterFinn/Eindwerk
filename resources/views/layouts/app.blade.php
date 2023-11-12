<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')  
    <title>Eindwerk</title>
</head>
<body>
<div class="flex justify-center items-center flex-col">
        @yield('topbar')
        @show
    @show
    <div class="flex items-center w-full p-4 py-4">
        {{-- @yield('sidebar')
        @show --}}
        @yield('content')
    </div>
</div>
</body>

</html>

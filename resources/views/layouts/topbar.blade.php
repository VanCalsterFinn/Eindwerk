@section('topbar')
    <div class="flex justify-between items-center w-full p-4 shadow">
        <a class="text-blue-700 font-bold text-2xl" href="/dashboard">Bachelorproef</a>
        <div class="flex gap-4">
            <ul class="flex justify-center items-center gap-4">
                <li>
                    <a href="/dashboard"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="/part?page=1"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('part') ? 'active' : '' }}">Parts</a>
                </li>
                <li>
                    <a href="/build_orders"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('build_orders') ? 'active' : '' }}">Build Orders</a>
                </li>
                <li>
                    <a href="/bill_of_material"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('bill_of_material') ? 'active' : '' }}">BOM</a>
                </li>
                <li>
                    <a href="/category"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('category') ? 'active' : '' }}">Categories</a>
                </li>
                <li>
                    <a href="/scan"
                        class="flex justify-center items-center cursor-pointer border-b-2 border-transparent hover:border-slate-200 p-2
                    {{ request()->is('scan') ? 'active' : '' }}">Scan</a>
                </li>
            </ul>
            <div class="flex justify-center items-center hover:opacity-80">
                @if (session('token') != null)
                    <a href="/logout"><button class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">Logout</button></a> 
                @else
                    <a href="/login"><button class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">Login</button></a>
                @endif
                
            </div>
        </div>
    </div>
@endsection

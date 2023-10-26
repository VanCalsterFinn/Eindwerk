{{-- Sidebar design --}}
@section('sidebar')
    <div class="flex justify-center flex-col w-60 shadow">

        <div class="flex gap-4 p-4 w-full border-b border-gray-200 cursor-pointer" onclick="toggleActive()">
            <p>X</p>
            <p>Dashboard</p>
        </div>

        <div class="flex gap-4 p-4 w-full border-b border-gray-200 cursor-pointer">
            <p>X</p>
            <p>Inventory</p>
        </div>
        
        <div class="flex gap-4 p-4 w-full border-b border-gray-200 cursor-pointer">
            <p>X</p>
            <p>Orders</p>
        </div>
        
        <div class="flex gap-4 p-4 w-full border-b border-gray-200 cursor-pointer">
            <p>X</p>
            <p>Scan</p>
        </div>
    </div>
@endsection
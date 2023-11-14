{{-- location_banner design --}}
@section('location_banner')
    <div class="flex items-center p-4 font-bold w-full">
        <p>{{ request()->route()->uri }}</p>
    </div>
@endsection
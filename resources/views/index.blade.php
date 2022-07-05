@extends('layout')

@section('content')
@include('partials.nav')
@include('partials.features')
{{-- listing --}}
<div class="listings">
    {{-- card --}}
    @foreach ($Rooms as $room)
     <x-card :room=$room/>
    </div>
    @endforeach
     {{-- card --}}
</div>
{{-- end of listing --}}
@endsection
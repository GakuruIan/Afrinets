@extends('dash')
{{-- table for listing customers --}}
@section('tablecontent')
@include('partials/dashnav')
<table class="table">
    <thead>
        <tr>
            <th class="mobile-hide">customer ID</th>
            <th>Customer name</th>
            <th class="sm">Customer Email</th>
            <th>check in</th>
            <th>check out</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Info as $info)
        <tr class="hoverable">
            <td class="mobile-hide">{{$info->customerID}}</td>
            <td>{{$info->name}}</td>
            <td class="sm">{{$info->email}}</td>
            <td>{{$info->checkin}}</td>
            <td>{{$info->checkout}}</td>
        </tr>
        @endforeach
      
    </tbody>
</table>
@endsection
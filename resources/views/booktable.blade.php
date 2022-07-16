@extends('dash')

@section('tablecontent')
@include('partials/dashnav')
<table class="table">
    <thead>
        <tr>
            <th>customer ID</th>
            <th>Customer name</th>
            <th>Customer Email</th>
            <th>check in</th>
            <th>check out</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Info as $info)
        <tr class="hoverable">
            <td>{{$info->customerID}}</td>
            <td>{{$info->name}}</td>
            <td>{{$info->email}}</td>
            <td>{{$info->checkin}}</td>
            <td>{{$info->checkout}}</td>
        </tr>
        @endforeach
      
    </tbody>
</table>
@endsection
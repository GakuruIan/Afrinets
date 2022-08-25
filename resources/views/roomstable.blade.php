@extends('dash')

@section('tablecontent')
@include('partials/dashnav')
{{-- table for listing all the rooms --}}
<table class="table">
    <thead>
        <tr>
            <th class="mobile-hide">HotelID</th>
            <th>Image</th>
            <th class="sm">Ratings</th>
            <th class="action">Location</th>
            <th>pricing</th>
            <th class="action">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Info as $info)
        <tr class="non-hoverable">
            <td class="mobile-hide">{{$info->hotelID}}</td>
            <td><img src={{URL::asset('storage/'.$info->snap)}} alt="hotelimage"></td>
            <td class="sm">{{$info->Rating}}</td>
            <td>{{$info->location}}</td>
            <td>{{$info->pricing}}</td>
            <td>
                <a href="/edit/{{$info->ID}}"><button class="btn btn-edit">Edit</button></a>
                <form action="/delete/{{$info->ID}}" method="post" style="display:inline ">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button class="btn btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      
    </tbody>
</table>
@endsection
@extends('dash')

@section('tablecontent')
@include('partials/dashnav')
<table class="table">
    <thead>
        <tr>
            <th>HotelID</th>
            <th>Image</th>
            <th>Ratings</th>
            <th>Location</th>
            <th>pricing</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Info as $info)
        <tr class="non-hoverable">
            <td>{{$info->hotelID}}</td>
            <td><img src={{URL::asset('storage/'.$info->snap)}} alt="hotelimage"></td>
            <td>{{$info->Rating}}</td>
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
@extends('layout')

@section('content')

<div class="dash">
    <div class="bar">
        <ul class="dashbar">
            <li><a href=""><i class="uil uil-book"></i> Bookings</a></li>
            <li><a href=""><i class="uil uil-estate"></i> Rooms</a></li>
            <li><a href=""><i class="uil uil-envelope"></i> Mails </a></li>
            <li><a href=""><i class="uil uil-setting"></i> Account settings</a></li>
            <li><a href=""><i class="uil uil-signout"></i> Log out</a></li>
        </ul>
    </div>
    <div class="dash_content">
        <table class="table">
            <thead>
                <tr>
                    <th>RoomID</th>
                    <th>Customer name</th>
                    <th>Customer Email</th>
                    <th>Location</th>
                    <th>check in</th>
                    <th>check out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Info as $info)
                <tr>
                    <td>{{$info->hotelID}}</td>
                    <td>{{$info->name}}</td>
                    <td>{{$info->email}}</td>
                    <td>{{$info->location}}</td>
                    <td>{{$info->checkin}}</td>
                    <td>{{$info->checkout}}</td>
                </tr>
                @endforeach
              
            </tbody>
        </table>
    </div>
</div>

@endsection
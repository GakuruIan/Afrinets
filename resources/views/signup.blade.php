@extends('layout')

@section('content')
@include('partials.nav')
    <div class="book_page sign">
        <div class="form_container">
            <header class="title">Sign Up</header>
            <form action="/register" method="post">
                     {{ csrf_field() }}
                <div class="form_group">
                    <label for="hotelEmail">Hotel Email</label>
                    <input type="email" name="hotelEmail" id="hotelEmail" class="form_control"placeholder="hotel@gmail.com" value="{{old('hotelEmail')}}">
                    <span class="muted_text">We'll not share your Email with anyone</span>
                    @error('hotelEmail') 
                    <span class="muted_text danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="hotelPassword">New Password</label>
                    <input type="password" name="password" id="hotelPassword" class="form_control" placeholder="Set new password">
                    <span class="muted_text">minimum of 8 characters</span>
                    @error('password') 
                    <span class="muted_text danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmPassword" class="form_control" placeholder="Re-enter password">
                    <span class="muted_text"></span>
                </div>
                <div class="form_group">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <div class="form_group">
                    <span class="muted_text">Have An Account? <a href="/login"> Login</a> </span>
                </div>
            </form>
        </div>
    </div>
@endsection
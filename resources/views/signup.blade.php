@extends('layout')

@section('content')
@include('partials.nav')
    <div class="book_page sign">
        <div class="form_container">
            <header class="title">Sign Up</header>
            <form action="/register" method="post">
                     {{ csrf_field() }}
                <div class="form_group">
                    <label for="companyName">Company Name</label>
                    <input type="text" name="company_name" id="companyName" class="form_control" placeholder="Stark company" value="{{old('company_name')}}">
                    @error('company_name') 
                    <span class="muted_text danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="companyEmail">Company Email</label>
                    <input type="email" name="companyEmail" id="companyEmail" class="form_control"placeholder="company@gmail.com" value="{{old('companyEmail')}}">
                    <span class="muted_text">We'll not share your Email with anyone</span>
                    @error('companyEmail') 
                    <span class="muted_text danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="companyLocation">Company Location</label>
                    <input type="text" name="location" id="companyLocation" class="form_control" placeholder="E.g Nairobi" value="{{old('location')}}">
                    <span class="muted_text">Company Office Location</span>
                    @error('location') 
                    <span class="muted_text danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="companyPassword">New Password</label>
                    <input type="password" name="password" id="companyPassword" class="form_control" placeholder="Set new password">
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
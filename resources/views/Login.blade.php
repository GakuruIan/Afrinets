@extends('layout')

@section('content')
@include('partials.nav')
     <x-flash-message/>
    <div class="book_page">
        <div class="form_container">
            <header class="title">Login</header>
            <form action="/login/auth" method="post">
                {{ csrf_field() }}
                <div class="form_group">
                    <label for="companyEmail">Company Email</label>
                    <input type="email" name="companyEmail" id="companyEmail" class="form_control" placeholder="company@gmail.com" value="{{old('companyEmail')}}">
                    <span class="muted_text">We will not share you Email</span>
                    @error('companyEmail')
                    <span class="muted_text">{{$message}}</span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form_control" placeholder="password">
                </div>
                <div class="form_group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="form_group">
                    <span class="muted_text">Don't Have An Account? <a href="/signup"> Sign Up</a> </span>
                </div>
            </form>
        </div>
    </div>
@endsection
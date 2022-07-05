@extends('layout')

@section('content')
@include('partials.nav')
    <div class="book_page">
            <div class="form_container">
                <header class="title">BOOK</header>
                <form action="/booking" method="post">
                    {{ csrf_field() }}
                    <div class="form_group">
                        <input type="hidden" name="hotelID" value={{$id}}>
                    </div>
                    <div class="form_group">
                        <label for="">Fullnames</label>
                        <input type="text" name="name" id="names" class="form_control" placeholder="John Doe">
                        @error('name')    
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form_control" placeholder="John@gmail">
                        @error('email')    
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="">National ID</label>
                        <input type="text" name="nationalID" id="id" class="form_control" placeholder="3728913">
                        @error('nationalID')    
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="">Check In</label>
                        <input type="date" name="checkin" id="checkin" class="form_control" placeholder="check in">
                        @error('checkin')    
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="">Check Out</label>
                        <input type="date" name="checkout" id="checkout" class="form_control" placeholder="check out">
                        @error('checkout')    
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Book</button>
                    </div>
                </form>
            </div>     
    </div>
@endsection
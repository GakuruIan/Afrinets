@extends('layout')

@section('content')
@include('partials.nav')
    <div class="book_page create">
            <div class="form_container">
                <header class="title">ROOM</header>
                <form action="/createRoom" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value={{auth()->user()->companyID}} name="companyID" id="company">
                    <div class="form_group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form_control" placeholder="Eg Nairobi">
                        <span class="muted_text">Location of Room</span>
                        @error('location')
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="rating">Rating</label>
                        <select class="form_control" id="rating" name="rating">
                            <option>1 </option>
                            <option>2 </option>
                            <option>3 </option>
                            <option>4 </option>
                            <option>5 </option>
                          </select>
                          @error('rating')
                          <span class="muted_text">{{$message}}</span>
                          @enderror
                    </div>
                    <div class="form_group">
                        <label for="amenities">Amenities</label>
                        <textarea class="form_control" id="amenities" name="amenities" rows="2" placeholder="Example Wifi,spur,suana"></textarea>
                        <span class="muted_text">Comma separated values</span>
                    </div>
                    <div class="form_group">
                        <label for="roomDetails">Room Details</label>
                        <textarea class="form_control" id="amenities" name="roomDetails" rows="2" placeholder="Room Details"></textarea>
                        @error('roomDetails')
                          <span class="muted_text">{{$message}}</span>
                          @enderror
                    </div>
                    <div class="form_group">
                        <label for="Pricing">Pricing</label>
                        <input type="number" name="pricing" id="pricing" class="form_control" placeholder="price per night">
                        @error('pricing');
                        <span class="muted_text">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form_group">
                      <label for="image">Room image</label>
                      <input type="file" name="snap" />
                       @error('image')
                       <span class="muted_text">{{$message}}</span>
                       @enderror
                     </div>
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Add Room</button>
                    </div>
                </form>
            </div>     
    </div>
@endsection
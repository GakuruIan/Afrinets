@extends('dash')

@section('tablecontent')
@include('partials/dashnav')
<div class="book_page update">
    <div class="form_container">
        <header class="title">
            <h3>Update Room</h3>
        </header>
        <form action="/update/{{$info->ID}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <input type="hidden" value={{$info->ID}} name="ID" id="hotel">
            <input type="hidden" value={{$info->Rating}} name="rating" id="company">
            <div class="form_group">
                <img src={{URL::asset('storage/'.$info->snap)}} alt="hotel">
            </div>
            <div class="form_group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form_control" placeholder="Eg Nairobi" value="{{$info->location}}">
                <span class="muted_text">Location of Room</span>
                @error('location')
                <span class="muted_text">{{$message}}</span>
                @enderror
            </div>
            <div class="form_group">
                <label for="amenities">Amenities</label>
                <textarea class="form_control" id="amenities" name="amenities" rows="2" placeholder="Example Wifi,spur,suana">{{$info->amenities}}</textarea>
                <span class="muted_text">Comma separated values</span>
            </div>
            <div class="form_group">
                <label for="Pricing">Pricing</label>
                <input type="number" name="pricing" id="pricing" class="form_control" placeholder="price per night" value={{$info->pricing}}>
                @error('pricing');
                <span class="muted_text">{{$message}}</span>
                @enderror
            </div>
             <div class="form_group">
              <label for="image">Room image</label>
              <input type="file" name="snap" value="{{$info->snap}}"/>
               @error('image')
               <span class="muted_text">{{$message}}</span>
               @enderror
             </div>
            <div class="form_group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>     
</div>
@endsection
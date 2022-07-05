@extends('layout')

@section('content')
@include('partials.nav')
@include('partials.features')
    <div class="view">
        {{-- left view --}}
        <div class="hotel_img">
           <div class="img_container">
             <img src={{URL::asset('storage/'.$room[0]->snap)}} alt="hotel" srcset="">
           </div>
        </div>
        {{-- end left view --}}

        {{-- right view --}}
        <div class="hotel_details">
            <div class="hotel_wrapper">
                <h1>{{$room[0]->company_name}}</h1>
                <div class="info">
                    <h4>Location:</h4>
                    <p>{{$room[0]->location}}</p>
                </div>
                <div class="info">
                    <h4>Rating:</h4>
                    <p>{{$room[0]->Rating}}</p>
                </div>
                <div class="info">
                    <h4>Pricing:</h4>
                    <p>{{$room[0]->pricing}}</p>
                </div>
                {{-- amenities section --}}
                <h4>Amenities</h4>
                <x-amenities :amenities="$room[0]->amenities"/>
                 {{--end of amenities section --}}

                 {{-- booking button --}}
                 <a href="/booking/{{$room[0]->hotelID}}">
                    <button class="btn btn-primary btn-lg">Book</button>
                 </a>
                 {{-- enf of booking button  --}}

                {{-- related section --}}
                <div class="more_img">
                    <h5>Related</h5>
                    <div class="grid_box">
                        <a href="#"><img src={{URL::asset('Images/2.jpg')}} alt="hotel" srcset=""></a>
                        <a href="#"><img src={{URL::asset('Images/3.jpg')}} alt="hotel" srcset=""></a>
                        <a href="#"><img src={{URL::asset('Images/4.jpg')}} alt="hotel" srcset=""></a>
                        <a href="#"><img src={{URL::asset('Images/5.jpg')}} alt="hotel" srcset=""></a>
                    </div>
                   </div>
            </div>
              {{-- end of related section --}}
        </div>
        {{-- end of right view --}}
    </div>
@endsection
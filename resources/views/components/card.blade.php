<div class="card">
    <img src="{{asset('storage/'.$room->snap)}}" alt="hotel image" srcset="">
    <div class="card-info">
        <div class="card-title">
            <h4><a href="/view/{{$room->hotelID}}">{{$room->company_name}}</a></h4>
            <p>{{$room->Rating}} <i class="uil uil-favorite"></i></p>
        </div>
        <p>location: <span>{{$room->location}}</span></p>
        <p>pricing: <span>{{$room->pricing}} per night</span></p>
</div>
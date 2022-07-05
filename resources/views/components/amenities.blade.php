@props(['amenities'])
@php
 $amenities=explode(',',$amenities);   
@endphp
<div class="amenities">
    @foreach ($amenities as $amenity)
       <div class="amenity center">
         <span>{{$amenity}}</span>
       </div>
    @endforeach
</div>
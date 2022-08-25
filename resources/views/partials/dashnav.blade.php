<div class="bar">
    <ul class="dashbar">
        <li><a href="/"><i class="uil uil-estate"></i> Home</a></li>
        <li><a href="/dashboard/{{auth()->user()->hotelID}}"><i class="uil uil-book"></i> Bookings</a></li>
        <li><a href="/dashboard/rooms/{{auth()->user()->hotelID}}"><i class="uil uil-building"></i> Rooms</a></li>
        <li><a href="/createRoom"><i class="uil uil-plus"></i> Add Room</a></li>
        <li><a href=""><i class="uil uil-envelope"></i> Mails </a></li>
        <li><a href="/dashboard/Account/{{auth()->user()->hotelID}}"><i class="uil uil-setting"></i> Account</a></li>
        <li><a href="/logout"><i class="uil uil-signout"></i> Log out</a></li>
    </ul>
</div>
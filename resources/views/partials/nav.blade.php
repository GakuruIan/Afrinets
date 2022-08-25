  {{-- navbar --}}
  <div class="navbar">
    <div>
        <h1>Afrinets</h1>
    </div>
    <div class="search">
        <form action="\search" method="">
            <input type="text" name="search" id="search" placeholder="search">
            <div>
                <button><i class="uil uil-search"></i></button>
            </div>
        </form>
    </div>
    <div class="menu">
        <ul>
            @auth
          
            <span class="sm">  {{auth()->user()->hotelEmail}}</span>
            <li><a href="/dashboard/{{auth()->user()->hotelID}}">Dashboard</a></li>
               <li><a href="/logout">Logout</a></li>
           <li> <a href="/createRoom"> <button class="btn icon-btn"><i class="uil uil-plus"></i> Post</button></a></li>
            @else
            <li><a href="/">Home</a></li>
            <li><a href="#">Recent</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/signup">Register</a></li>
            @endauth
           
        </ul>
        <div class="mobile">
            <i class="uil uil-apps"></i>
        </div>
    </div>
</div>
{{-- end of navbar --}}
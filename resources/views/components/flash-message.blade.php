@if(session()->has('message'))
    <div class="flash-message">
        <div class="message">
           <span>{{session('message')}}</span>
        </div>
    </div>
@endif

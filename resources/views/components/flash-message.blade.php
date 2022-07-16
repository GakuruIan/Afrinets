@if(session()->has('message'))
    <div class="flash-message" x-data="{show:true}" x-init="setTimeout(()=> show = false,3000)" x-show="show">
        <div class="message">
           <span>{{session('message')}}</span>
        </div>
    </div>
@endif

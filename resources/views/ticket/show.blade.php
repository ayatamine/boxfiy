@extends('layouts.profile')
@section('title','ticket details')
@section('styles')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/customer_service.css')}}">
<style>
    .chat-window >.btn-submit {
    font-size: 20px;
    background-color: orange;
    border-radius: 50%;
    padding: 9px 13px;
    margin-left: 10px;
    cursor: pointer;
}
</style>
@endsection
@section('content')


<!--Start Chat-->
<div class="Cont" style="margin-bottom: 7rem;">
    <div class="information">
    <h2 id="text" style=" margin-bottom:20px;">Ticket Number : <span>{{$ticket->id}}</span> </h2>
    <h2 id="text" style=" margin-bottom:20px;">Ticket Type : <span>{{$ticket->category->title}}</span></h2>
    <h2 id="text" style=" margin-bottom:20px;">Time For Answer : <span>0-1 Hour</span></h2>
</div>
<ul class="chat-thread">
    <li class="left">{{$ticket->content}}</li>
    @if(count($ticket->replies))
    @foreach ($ticket->replies as $reply)
        
        <li  class="@if(auth()->id() == $reply->user_id) left @else right @endif">{{$reply->message}}</li>

    @endforeach
	@endif    
    @if($ticket->status =='closed')
    <li style="    display: block;
    clear: both;color:#f38e06;
    bottom: -6rem;">This ticket has been closed,please open another one</li>
    @endif
</ul>
@if($ticket->status !=='closed')
<form class="chat-window" method="POST" action="{{route('ticket.reply',['id'=>$ticket->id])}}">
    @csrf
	<input class="chat-window-message px-4" name="message" type="text" required autocomplete="off" autofocus />
    <button type="submit" class="btn-submit">
        <i style="display: inline;" class="fa-solid fa-paper-plane"></i>  
    </button>  
   
</form>
@endif
</div>
<!--end Chat-->

@endsection
@extends('layouts.app')
@section('title','About Us')
@section('styles')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/About-us.css')}}">
@endsection
@section('content')
@php
    $indexes = ['one','two','three','four','five','six','seven'];
@endphp
<section id="cd-timeline" class="cd-container">
    @foreach ($sections as $key=>$section)
        
    <div id="{{$indexes[$key]}}" class="cd-timeline-block">
        @if($key ==0 || $key ==1)
        <div class="cd-timeline-img cd-picture">
            <i class="fa-solid fa-address-card"></i>
        </div> <!-- cd-timeline-img -->
        @else 
        <div class="cd-timeline-img cd-picture">
            <i class="fa-solid fa-handshake"></i>
        </div>
        @endif

        <div class="cd-timeline-content">
            <h2 style="font-size: 25px; color:orange;">{{$section->title}}</h2>
            <p style="font-size: 20px;"> {{$section->content}}</p>
        </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    @endforeach

</section> 

@endsection

@section('scripts')
<script src="{{asset('BoxfiyV6/js/About-us.js')}}"></script>
@endsection
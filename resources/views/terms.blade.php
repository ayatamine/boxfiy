@extends('layouts.app')
@section('title','Terms')
@section('content')
<div class="terms">
    <div class="container">
        <div class="row">
            <h1>{{$page->title}}</h1>


           <p>
            {!!$page->body!!}
           </p>
        </div>
    </div>
</div>
@endsection
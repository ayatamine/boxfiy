@extends('layouts.app')
@section('title','Services')
@push('style-c')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/services.css')}}">
@endpush
@section('content')
  <livewire:services>
@endsection
@section('scripts')
<script src="{{asset('BoxfiyV6/js/Services.js')}}"></script>
@endsection
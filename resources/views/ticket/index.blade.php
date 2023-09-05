@extends('layouts.profile')
@section('title','tickets')

@section('content')
<div class="New-Ticket">
  @if(session()->has('success'))
  <x-dissmissable-alert type="success">
    {{ session('success') }}
</x-dissmissable-alert>
  @endif
  <div class="new-ticket">
      <a href="{{route('tickets.create')}}"><i class="fa-solid fa-plus"></i></a>
      <h1>New Ticket</h1>
  </div>
  <livewire:tickets>

</div>
@endsection

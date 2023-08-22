@extends('layouts.profile')
@section('title','create new ticket')

@section('content')
<div class="New-Ticket">
  <div class="new-ticket">
      <a href="tickets-form.html"><i class="fa-solid fa-plus"></i></a>
      <h1>New Ticket</h1>
  </div>
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-8">
    {{-- <livewire:create-ticket> --}}
    <form  method="POST" action="{{route('tickets.store')}}">
      @csrf
  
      <!-- Ticket Category -->
      <div class="mb-4">
        <label for="ticket_category_id" class="block text-gray-700 text-xl font-bold mb-2">Category</label>
        <select name="ticket_category_id" id="ticket_category_id" class="w-full px-3 py-5 border rounded shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
          <!-- Populate options with ticket categories from your database -->
          @foreach ($ticketCategories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>
  
      <!-- Order ID -->
      <div class="mb-4">
        <label for="order_id" class="block text-gray-700 text-xl font-bold mb-2">Order ID</label>
        <input type="text" name="order_id" id="order_id" class="w-full px-3 py-3 border rounded shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
        @error('order_id')
          <p class="text-red-500 text-lg italic">{{ $message }}</p>
        @enderror
      </div>
  
      <!-- Title -->
      <div class="mb-4">
        <label for="title" class="block text-gray-700 text-xl font-bold mb-2">Title</label>
        <input type="text" name="title" id="title" class="w-full px-3 py-3 border rounded shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
         @error('title')
          <p class="text-red-500 text-lg italic">{{ $message }}</p>
        @enderror
      </div>
  
      <!-- Content -->
      <div class="mb-4">
        <label for="content" class="block text-gray-700 text-xl font-bold mb-2">Description</label>
        <textarea name="content" id="content" rows="4" class="w-full px-3 py-3 border rounded shadow-sm focus:outline-none focus:ring focus:ring-blue-200"></textarea>
         @error('content')
          <p class="text-red-500 text-lg italic">{{ $message }}</p>
        @enderror
      </div>
  
      <!-- Submit Button -->
      <div class="mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-200">Submit Ticket</button>
      </div>
    </form>
  </div>
</div>
@endsection

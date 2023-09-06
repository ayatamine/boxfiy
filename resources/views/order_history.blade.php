@extends('layouts.profile')
@section('title','Order History')
@push('style-c')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/services.css')}}">
<style>
  .pagination .sm\:hidden{display: inline !important;}
  .pagination .sm\:hidden a,
  .pagination .sm\:hidden span{
    padding: 1rem ;    font-size: 14px;
  }
</style>
@endpush
@section('content')
<div class="row mx-auto px-20 py-3 mt-24">
  @if (session()->has('success'))
  <x-dissmissable-alert type="success">
      {{ session('success') }}
  </x-dissmissable-alert>
  @elseif(session()->has('error'))
    <x-dissmissable-alert type="error">
        {{ session('error') }}
    </x-dissmissable-alert>
  @endif 
  @if(count($orders))
  <table class="border-separate border-spacing-y-4 bg-none table-auto w-full text-xl mt-8">
    <thead class="h-[50px] ">
      <tr class="bg-[#21242cff] text-white rounded-xl p-4 py-10 h4 border-0">
        <th class=" font-bold p-4 pl-8  text-left">Order Num</th>
        <th class=" font-bold p-4  text-left">Service Name</th>
        <th class=" font-bold p-4 pr-8  text-left">Link </th>
        <th class=" font-bold p-4 pr-8  text-left">Amount </th>
        <th class=" font-bold p-4 pr-8  text-left">Price </th>
        <th class=" font-bold p-4 pr-8  text-left">Date </th>
        <th class=""> </th>
      </tr>
    </thead>
    <tbody class="bg-none ">
      @foreach ($orders as $order)

      <tr class="bg-[#21242cff] text-white rounded-xl p-4 py-8 text-xl border-0 mb-3">
        <td class=" font-bold p-4 pl-8  text-left">{{$order->id}}</td>
        <td class=" font-bold p-4 pl-8  text-left">{{$order->service->name}}</td>
        <td class=" font-bold p-4 pl-8 ">
          <a href="{{$order->link}}" target="_blank">{{\Illuminate\Support\Str::limit($order->link,40)}}</a>
        </td>
        <td class=" font-bold p-4 pl-8  text-left">{{$order->amount}}</td>
        <td class=" font-bold p-4 pl-8  text-left">{{$order->price}}</td>
        <td class=" font-bold p-4 pl-8 ">{{date('d-M-Y',strtotime($order->created_at))}}</td>
        <td class=" font-bold p-4 pl-8 ">
          <span class="{{$order->status}}">{{$order->status}}</span>
        </td>

      </tr>
      @endforeach
     
    </tbody>
  </table>
  <div class="mt-5 flex justify-center items-center pagination">{{$orders->links()}}</div>
  @else 
  <div class="bg-blue-200 text-blue-800 text-2xl p-5 py-6 rounded-lg mb-3 mt-8 container">
   No order yet,Feel free to contact us, we are happy to help
  </div>
  @endif
</div>
@endsection
@section('scripts')



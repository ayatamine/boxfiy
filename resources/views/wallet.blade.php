@extends('layouts.profile')
@section('title','Wallet')
@push('style-c')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/services.css')}}">
<style>
  [x-cloak] { display: none !important }
</style>
@endpush
@section('content')
  <livewire:wallet>
@endsection
@section('scripts')
<script src="{{asset('BoxfiyV6/js/Services.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  window.addEventListener('order-submit', event => {
//     Swal.fire(
     
//   'Thanks for submitting order , you will get confirmation soon',
//   'success'
//   showConfirmButton: false,
//   timer: 1500
// )
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title:  'Order Submitted Successfully',
  showConfirmButton: false,
  timer: 5000
})
})
  window.addEventListener('no-form-data', event => {
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title:  'Please fill the form correctly',
  showConfirmButton: false,
  timer: 3000
})
})
 
</script>

@endsection
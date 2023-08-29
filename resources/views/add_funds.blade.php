@extends('layouts.profile')
@section('title','Add Funds')
@section('styles')
    <style>
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.non_related_payment_method{
   position: absolute;
    top: 60px;
    width: 100%;
    border-top: 1px solid #4e4b4b;
    background: #262a36;
    border-radius: 5px;
    padding: 1.2rem;
    color: white;
    z-index: 99;display: none;

}
    </style>
@endsection
@section('content')

    <!-- Start Add Funds Section -->
    <section class="add-funds">
        <livewire:add-funds>
        
    </section>
      <!-- End Add Funds Section -->

@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

window.addEventListener('payment-gateway-not-supported', event => {
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title:  'The Selected Payment gateway is not supported yet',
  showConfirmButton: false,
  timer: 3000
})
})
window.addEventListener('alert-error', event => {

Swal.fire({
  position: 'top-end',
  icon: 'error',
  title:  event.detail,
  showConfirmButton: false,
  timer: 3000
})
})

window.addEventListener('submit-spaceremit-form',function(event){
  console.log('submitting')
  // document.getElementById('amount_to_pay').value =event.detail.amount
  document.getElementById('spaceremit-form').submit();
  });
</script>






<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


@endsection
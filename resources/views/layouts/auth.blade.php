@extends('layouts.base')

@section('body')
    <div class="">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  window.addEventListener('account-suspended', event => {
//     Swal.fire(
     
//   'Thanks for submitting order , you will get confirmation soon',
//   'success'
//   showConfirmButton: false,
//   timer: 1500
// )
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title:  'Your account was suspended, please contact admin',
  showConfirmButton: false,
  timer: 5000
})
  })
</script>
@endsection
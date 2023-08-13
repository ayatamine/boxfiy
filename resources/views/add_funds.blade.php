@extends('layouts.profile')
@section('title','Add Funds')
@section('content')

    <!-- Start Add Funds Section -->
    <section class="add-funds">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-5 col-sm-5 mb-5 col-xs-12 col-5">
                    <div class="funds-content">
                        <h1 style="min-width: 300px;">How you would like to pay?</h1>

                        <img src="{{asset('BoxfiyV6/images/icons/7.png')}}">
                    </div>
                </div>

                <livewire:add-funds>



            </div>
        </div>
    </section>
      <!-- End Add Funds Section -->

@endsection
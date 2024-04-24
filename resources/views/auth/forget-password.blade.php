@extends('layouts.app-layout')

@section('content')

<x-hero-banner></x-hero-banner>

<?php $title = 'Forget Password' ?>

<!-- forget-password  -->

<div class="container login-form">

    <div class="row align-items-center justify-content-center g-1 gap-2">

        <div class="col col-sm-12 col-lg-6 form-img">
            <img src="images/Rectangle.png" class="img-fluid" alt="..." height="80%" width="95%">
        </div>

        <div class="col col-sm-12 col-lg-4 form">

            <form>

                <div class="d-flex justify-content-center align-items-center flex-column">
                    <h3 class=" fs-2 fw-bold">Forget your password?</h3>
                    <p class="text-center fs-5">Please enter the email you use to <br> sign in to acme.</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-4 text-secondary fw-bold fs-6">E-mail</label>

                        <div class="login-input border d-flex p-2 align-items-center">
                            <img src="images/login/Suche.png" class=" login-logo mx-1" alt="" height="21" width="25">
                            <input type="email" class="form-control d-block fs-5  rounded-0  input border border-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your e-mail">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary rounded-0 btn-lg login-form-btn form-btn border-0 fw-bold">Request Password Reset</button>
                </div>



            </form>

        </div>


    </div>

</div>

<!-- forget-password  -->
  
@endsection
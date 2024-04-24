@extends('layouts.app-layout')

@section('content')
    <?php
    $title = 'Profile';
    ?>

    <x-hero-banner></x-hero-banner>

    <div class="container py-5">

        <div class="row row-cols-1 row-cols-md-3 g-4 flex-wrap detail-col">

            <div class="col-sm-6 col-md-12 col-lg-5 mb-3 mb-sm-0 detail-row">
                <div class="card bg-body-tertiary d-flex justify-content-center align-items-center py-5 h-100">
                    <img src="{{empty($userDetail->profile_img) ? 'images/default.jpg' : Storage::url($userDetail->profile_img) }} " alt="" class="rounded-circle" width="40%">
                    <div class="card-body text-center">
                        <h2 class="text-dark fw-semibold">{{implode($userDetail->name)}}</h2>
                        <p class="fw-bold fs-5">Email- {{$userDetail->email}}</p>
                        <p class=" fs-5">Phone- 259 875 69875</p>
                        <a href="{{ route('profile-edit') }}" class="link-light link-offset-2 link-underline-opacity-0">
                            <button type="button" class="btn btn-primary rounded-0 fs-5">Edit</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-12 col-lg-7 detail-row">
                <div class="card bg-body-tertiary p-5 h-100">
                    <div class="row flex-wrap flex g-4">
                        <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">First Name</div>
                        <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">
                            {{ $userDetail->name[0] }}</div>

                        <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Last Name</div>
                        <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">
                            {{ $userDetail->name[1] }}</div>

                        <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Gender</div>
                        <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">
                            {{ $userDetail->gender }}</div>

                        <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Country</div>
                        <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">
                            {{ $userDetail->country->country ?? '' }}</div>

                        <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Hobbies</div>
                        <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">
                            {{ $userDetail->hobbies }}</div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- upload data  -->
@endsection

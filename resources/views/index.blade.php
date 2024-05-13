@extends('layouts.app-layout')

@section('content')
    @php
        $title = 'Car Safe';
    @endphp

    <div class="home">
        <div class="container-fluid">
            <div class="row pt-5 row-gap-2">
                <div class="col-sm-12 col-lg-5 text-white ">
                    <h1 class="display-3 fw-bold lh-sm pt-4">Purchase and Sale <br>
                        Of Pre-Owned Cars </h1>
                    <p class="py-4 lh-lg home-p">Are you looking for amazing pre-owned cars purchase and sale <br>
                        services?
                        Don’t worry! We got it for you!</p>
                    <a href="{{ route('album.gallery') }}" class="link-light link-offset-2 link-underline-opacity-0"><button
                            type="button" class="btn  rounded-0 btn-lg home-btn fs-5 fw-bold text-white">Buy a
                            Car</button></a>
                    <span class="home-span fs-4 fw-semibold d-block pt-4">Trade or sell your car now <svg
                            xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14"
                            fill="none">
                            <path d="M0 12L5 7L0 2L1 0L8 7L1 14L0 12Z" fill="#01C0FA" />
                        </svg></span>
                </div>
                <div class="col-sm-12 col-lg-7 home-car"><img src="images/4-2-car-png-hd 1.png" alt=""
                        height="100%" width="100%"></div>
            </div>
        </div>

    </div>

    <!-- buy/sale -->

    <div class="container-fluid buy-sale position-relative">

        <div class="heading text-center">
            <h2 class="display-4 pb-5">Reasons to Buy/Sale a Car</h2>
        </div>

        <div class="container">
            <div class="row row-cols-1 justify-content-center row-cols-lg-3 g-5 buy-sale-content">
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 rounded-5">
                        <img src="images/buy-sell/Rectangle 519.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text p-2 fs-4 fw-semibold">3 month warranty on any mechanical issue which you can
                                extend to 12 months for and extra payment</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 rounded-5">
                        <img src="images/buy-sell/Rectangle 519 (1).png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text  p-2 fs-4 fw-semibold">You don´t have to deal directly with the seller but
                                through Carsafe as intermediary</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 rounded-5">
                        <img src="images/buy-sell/Rectangle 519 (2).png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text  p-2 fs-4 fw-semibold">Pre apply to a credit to pay for the car</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- buy/sale -->

    <!-- featured -->

    <div class="container-fluid featured-car">

        <div class="heading text-start d-flex pb-5">
            <h2 class="display-4">Our Featured Cars</h2>
            <div class="arrow-btn ms-auto">
                <button type="button" class="btn bg-transparent">
                    <img src="images/featured-images/Group 29.png" alt="">
                </button>
                <button type="button" class="btn featured-btn">
                    <img src="images/featured-images/Group 30.png" alt="">
                </button>
            </div>
        </div>

        <div class="container-fluid featured-car-img">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-12  g-5">
                <div class="col">
                    <div class="card rounded-5 border-0 shadow-sm  h-100 ">
                        <img src="images/featured-images/Rectangle 516.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title featured-h">Honda Accord EXL</h5>
                            <p class="card-text featured-p">2015 - 105,360 km - Monterey</p>
                            <p class="card-text featured-rate text-primary fw-bold">$256,999 <span
                                    class="text-body-secondary fw-semibold text-decoration-line-through fs-5 ps-2">$256,999</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-5 border-0 shadow-sm h-100 ">
                        <img src="images/featured-images/Rectangle 516 (1).png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title featured-h">Ford Edge SEL Plus</h5>
                            <p class="card-text featured-p">2015 - 105,360 km - Monterey</p>
                            <p class="card-text featured-rate text-primary fw-bold">$256,999 <span
                                    class="text-body-secondary fw-semibold text-decoration-line-through fs-5 ps-2">$256,999</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-5 border-0 shadow-sm h-100 ">
                        <img src="images/featured-images/Rectangle 516 (2).png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title featured-h">Jeep Grand Cherokee Summit HEMI</h5>
                            <p class="card-text featured-p">2015 - 105,360 km - Monterey</p>
                            <p class="card-text featured-rate text-primary fw-bold">$256,999 <span
                                    class="text-body-secondary fw-semibold text-decoration-line-through fs-5 ps-2">$256,999</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-5 border-0 shadow-sm h-100 ">
                        <img src="images/featured-images/Rectangle 516 (3).png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Audi A1 Hatch Back Cool</h5>
                            <p class="card-text featured-p">2015 - 105,360 km - Monterey</p>
                            <p class="card-text featured-rate text-primary fw-bold">$256,999 <span
                                    class="text-body-secondary fw-semibold text-decoration-line-through fs-5 ps-2">$256,999</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- featured -->

    <!-- service -->

    <div class="container-fluid service position-relative">

        <div class="heading text-center">
            <h2 class="display-4 pb-5">High Quality Output, <br> Awesome Services</h2>
        </div>

        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 justify-content-center g-5">
                <div class="col service-col">
                    <div
                        class="card rounded-4 border border-bottom-0 border-primary text-center justify-content-center align-items-center
                service-con">
                        <div class="position-relative service-img">
                            <img src="images/service-image/Rectangle 10.png" class="card-img-top" alt="...">
                            <img src="images/service-image/icons8_buy.png" class="position-absolute service-logo"
                                alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fs-3 fw-bolder pb-3">Buy a used car</h5>
                            <p class="card-text text-secondary fs-6 fw-semibold lh-lg mb-3">Lorem ipsum dolor sit
                                amet,<br>
                                consectetur adipiscing elit, sed do <br> eiusmod tempor </p>
                        </div>
                    </div>
                </div>
                <div class="col service-col">
                    <div
                        class="card rounded-4 border border-bottom-0 border-primary  text-center justify-content-center align-items-center
                service-con">
                        <div class="position-relative service-img">
                            <img src="images/service-image/Group 454.png" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fs-3 fw-bolder pb-3">Sell a used car</h5>
                            <p class="card-text text-secondary fs-6 fw-semibold lh-lg mb-3">Lorem ipsum dolor sit
                                amet,<br>
                                consectetur adipiscing elit, sed do <br> eiusmod tempor </p>
                        </div>
                    </div>
                </div>
                <div class="col service-col">
                    <div
                        class="card rounded-4 border border-bottom-0 border-primary  text-center justify-content-center align-items-center
                service-con">
                        <div class="position-relative service-img">
                            <img src="images/service-image/Rectangle 10.png" class="card-img-top" alt="...">
                            <img src="images/service-image/Group 1597882551.png" class="position-absolute service-logo"
                                alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fs-3 fw-bolder pb-3">Change a used car</h5>
                            <p class="card-text text-secondary fs-6 fw-semibold lh-lg mb-3">Lorem ipsum dolor sit
                                amet,<br>
                                consectetur adipiscing elit, sed do <br> eiusmod tempor </p>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div>

    <!-- service -->

    <!-- car-app -->

    <div class="container-fluid app-car">
        <div class="row row-gap-5">
            <div class="col-sm-12 col-lg-6 ">
                <h1 class="display-3 lh-sm pt-4 app-car-h">Manage your purchase/ <br> sale of pre-owned cars <br> with
                    our app</h1>
                <div class="d-flex">
                    <div class="p-2 "><img src="images/car-app/Vector.png" alt=""></div>
                    <div class="p-2 ps-4 fw-semibold text-secondary lh-lg app-car-p">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. <br> Venenatis eget malesuada vulputate ante quam iaculis ac.
                    </div>
                </div>
                <div class="d-flex">
                    <div class="p-2 "><img src="images/car-app/Vector.png" alt=""></div>
                    <div class="p-2 ps-4 fw-semibold text-secondary lh-lg app-car-p">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Elit ut <br> mauris pharetra vitae, malesuada. Gravida phasellus
                        quis vel. </div>
                </div>
                <div class="d-flex">
                    <div class="p-2 "><img src="images/car-app/Vector.png" alt=""></div>
                    <div class="p-2 ps-4 fw-semibold text-secondary lh-lg app-car-p">Pre apply to a credit to pay for
                        the car</div>
                </div>
                <button type="button" class="btn text-white rounded-0 btn-lg app-car-btn fs-5 fw-bold mt-4">Get To know
                    the Car Safe</button>
            </div>
            <div class="col-sm-12 col-lg-6 app-car-img"><img src="images/car-app/Rectangle 46.jpg" class="pt-5"
                    alt=""></div>
        </div>
    </div>

    <!-- car-app -->
@endsection

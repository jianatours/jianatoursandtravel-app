@extends('layouts.app')

@section('content')

<header class="masthead masthead-hotels">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">The most acoustic hotels</h1>
                </div>
                <div class="col-lg-8 align-self-baseline">
                </div>
            </div>
        </div>
    </header>

    <section id="content" class="page-section">
        <h1 class="text-center mb-5">The most rated Hotels</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a class="portfolio-box" href="images/images/hotels/Forest-Cottages-Kampala.jpg">
                            <img class="img-fluid card-img-top" src="images/images/hotels/Forest-Cottages-Kampala.jpg"
                                alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Forest Cottages Kampala</h5>
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a class="portfolio-box" href="images/images/hotels/kyaninga-lodge-1.jpg">
                            <img class="img-fluid card-img-top" src="images/images/hotels/kyaninga-lodge-1.jpg" alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Kyaninga Lodge</h5>
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a class="portfolio-box" href="images/images/hotels/Lake-Mburo-Safari-Lodge1.jpg">
                            <img class="img-fluid card-img-top" src="images/images/hotels/Lake-Mburo-Safari-Lodge1.jpg"
                                alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Lake Mburo Safari Lodge</h5>
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div>
            <h1 class="text-center mb-5">Some discounted deals for you</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <a class="portfolio-box" href="images/images/hotels/Forest-Cottages-Kampala.jpg">
                                <img class="img-fluid card-img-top" src="images/images/hotels/Forest-Cottages-Kampala.jpg"
                                    alt="">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Forest Cottages Kampala</h5>
                                    <p class="discount">30% off</p>
                                </div>
                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                    odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <a class="portfolio-box" href="images/images/hotels/kyaninga-lodge-1.jpg">
                                <img class="img-fluid card-img-top" src="images/images/hotels/kyaninga-lodge-1.jpg" alt="">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Kyaninga Lodge</h5>
                                    <p class="discount">35% off</p>
                                </div>
                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                    odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <a class="portfolio-box" href="images/images/hotels/Lake-Mburo-Safari-Lodge1.jpg">
                                <img class="img-fluid card-img-top" src="images/images/hotels/Lake-Mburo-Safari-Lodge1.jpg"
                                    alt="">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Lake Mburo Safari Lodge</h5>
                                    <p class="discount">25% off</p>
                                </div>
                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, ut
                                    odio. Nemo assumenda a dolores, soluta suscipit dignissimos</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.contact')
@endsection
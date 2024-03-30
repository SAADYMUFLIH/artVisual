@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')

<div>
    <section class="trip">
        <div class="section__container trip__container">
            <h2 class="section__title">Explore photo</h2>
            <p class="section__subtitle">
                Explore your suitable and dream places around the world. Here you can
                find your right destination.
            </p>
    
            <div class="container-fluid">
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button type="button" class="btn btn-outline-info">Search</button>
                </form>
            </div>
           
                <div class="trip__grid">
                  <div class="trip__card">
                    <img src="assets/trip-1.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>Wasserwerk Frelberg, Germany</p>
                            <div class="rating">
                              <i class="ri-thumb-up-line"></i> 4.2
                            </div>
                    </div>
                </div>
                <div class="trip__card">
                    <img src="assets/trip-2.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>Patagonia, Argentina and Chile</p>
                        <div class="rating">
                            <i class="ri-thumb-up-line"></i> 4.5
                        </div>
                    </div>
                </div>
                <div class="trip__card">
                    <img src="assets/trip-3.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>The Dolomites, Italy</p>
                        <div class="rating"><i class="ri-thumb-up-line"></i> 4.7</div>
                    </div>
                </div>
                  <div class="trip__card">
                    <img src="assets/trip-1.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>Wasserwerk Frelberg, Germany</p>
                        <div class="rating"><i class="ri-thumb-up-line"></i> 4.2</div>
                    </div>
                </div>
                <div class="trip__card">
                    <img src="assets/trip-2.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>Patagonia, Argentina and Chile</p>
                        <div class="rating"><i class="ri-thumb-up-line"></i> 4.5</div>
                    </div>
                </div>
                <div class="trip__card">
                    <img src="assets/trip-3.jpg" alt="trip" />
                    <div class="trip__details">
                        <p>The Dolomites, Italy</p>
                        <div class="rating"><i class="ri-thumb-up-line"></i> 4.7</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
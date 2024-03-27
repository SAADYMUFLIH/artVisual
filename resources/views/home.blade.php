@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection


@section('content')

<div class="section__container header__container">
    <div class="header__image">
        <img src="assets/header-1.jpg" alt="header" />
        <img src="assets/header-2.jpg" alt="header" />
    </div>
    <div class="header__content">
        <div>
            <p class="sub__header">ArtVisual</p>
            <h1>ArtVisualGallery</h1>
            <p class="section__subtitle">
                    Make your explore more enjoyable with us. We are the best travel
                    agency and we are providing the best travel services for our
                    clients.
            </p>
        </div>
    </div>
</div>

<section class="section__container destination__container">
    <div class="section__header">
        <div>
            <h2 class="section__title">Best Photo</h2>
            <p class="section__subtitle">
                Explore your suitable and dream places around the world. Here you
                can find your right destination.
            </p>
        </div>
    </div>
    <div class="destination__grid" id="destinationGrid">
        <div class="destination__card">
            <img src="assets/destination-1.jpg" alt="destination" />
            <div class="destination__details">
                <p class="destination__title">Banff</p>
                <p class="destination__subtitle">Canada</p>
            </div>
        </div>
        <div class="destination__card">
            <img src="assets/destination-2.jpg" alt="destination" />
            <div class="destination__details">
                <p class="destination__title">Machu Picchu</p>
                <p class="destination__subtitle">Peru</p>
            </div>
        </div>
        <div class="destination__card">
            <img src="assets/destination-3.jpg" alt="destination" />
            <div class="destination__details">
                <p class="destination__title">Lauterbrunnen</p>
                <p class="destination__subtitle">Switzerland</p>
            </div>
        </div>
        <div class="destination__card">
            <img src="assets/destination-4.jpg" alt="destination" />
            <div class="destination__details">
                <p class="destination__title">Zhangjiajie</p>
                <p class="destination__subtitle">China</p>
            </div>
        </div>
    </div>
</section>

<section class="trip">
    <div class="section__container trip__container">
        <h2 class="section__title">Explore photo</h2>
        <p class="section__subtitle">
            Explore your suitable and dream places around the world. Here you can
            find your right destination.
        </p>
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

<section class="gallary">
    <div class="section__container gallary__container">
        <div class="image__gallary">
            <div class="gallary__col">
                <img src="assets/gallery-1.jpg" alt="gallary" />
            </div>
            <div class="gallary__col">
                <img src="assets/gallery-2.jpg" alt="gallary" />
                <img src="assets/gallery-3.jpg" alt="gallary" />
            </div>
        </div>
        <div class="gallary__content">
            <div>
                <h2 class="section__title">
                    Our trip gallary that will inspire you
                </h2>
                <p class="section__subtitle">
                    Explore your suitable and dream places around the world. Here you
                    can find your right destination.
                </p>
            </div>
        </div>
    </div>
</section>




@endsection

@section('footer')
    @include('includes.footer')
@endsection

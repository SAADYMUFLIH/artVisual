@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="image" style="padding: 20px;">
            @if (Auth::user()->image === 'assets/profile/profile_default.jpg')
                <img src="{{ asset('assets/profile/profile_default.jpg') }}" alt="Profile Image" class="rounded" style="width: 155px; height: 160px;" >
            @else
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="rounded" style="width: 155px; height: 160px;" >
            @endif
            </div>

        <div class="ml-3 w-100">
           <h4 class="mb-0 mt-0">{{ Auth::user()->username }}</h4>
           <span class="mb-3">{{ Auth::user()->email }}</span>
           <div class="p-2 mt-4  bg-primary d-flex justify-content-between rounded text-white stats">

            <div class="d-flex flex-column">
                <span class="articles">Album</span>
                <span class="number1">38</span>
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Photo</span>
                <span class="number2">980</span>
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Like</span>
                <span class="number2">1 K</span>
            </div>

          </div>
        <!-- Button untuk membuka modal edit profil -->
        <div class="button mt-2 d-flex flex-row align-items-center">
            <a class="btn btn-sm btn-outline-primary w-100" href="{{ route('editProfile') }}">Edit</a>
        </div>        
         </div>    
        </div>      
    </div>  
</div>

<div style="margin-bottom: 10px"> 
    <section class="trip" style="padding-left: 50px; padding-right: 50px;" >
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="section__title">Album Photo</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Create album
            </button>
        </div>   
        
        <div class="trip__grid">
            <div class="trip__card">
                <img src="assets/trip-1.jpg" alt="trip" />
                <div class="trip__details">
                    <p>Wasserwerk Frelberg, Germany</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <button type="button" onclick="window.location.href='{{ route('detailalbum') }}'" class="btn btn-primary">Lihat</button>  
                </div>
            </div>

            <div class="trip__card">
                <img src="assets/trip-2.jpg" alt="trip" />
                <div class="trip__details">
                    <p>Patagonia, Argentina and Chile</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <button type="button" onclick="window.location.href='{{ route('detailalbum') }}'" class="btn btn-primary">Lihat</button>  
                </div>
            </div>

            <div class="trip__card">
                <img src="assets/trip-3.jpg" alt="trip" />
                <div class="trip__details">
                    <p>The Dolomites, Italy</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <button type="button" onclick="window.location.href='{{ route('detailalbum') }}'" class="btn btn-primary">Lihat</button>  
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

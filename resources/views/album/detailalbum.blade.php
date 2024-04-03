@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')
<div style="margin-bottom: 10px"> 
    <section class="trip" style="padding-left: 50px; padding-right: 50px;" >
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="section__title">Detail Photo</h2>
            <button type="button" onclick="window.location.href='{{ route('profile') }}'" class="btn btn-primary">kembali</button>  
        </div>        
       
            <div class="trip__grid">
              <div class="trip__card">
                <img src="assets/trip-1.jpg" alt="trip" />
                <div class="trip__details">
                    <p>Wasserwerk Frelberg, Germany</p> 
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <div class="rating">
                        <span><i class="ri-thumb-up-line"></i>10</span> <!-- Angka rating -->
                        <span style="margin-right: 10px;"></span> <!-- Spasi -->
                        <i class="ri-chat-3-line"> 4 rb</i> <!-- Ikon untuk komentar -->
                    </div>  
                </div>
            </div>

            <div class="trip__card">
                <img src="assets/trip-2.jpg" alt="trip" />
                <div class="trip__details">
                    <p>Patagonia, Argentina and Chile</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <div class="rating">
                        <span><i class="ri-thumb-up-line"></i>10</span> <!-- Angka rating -->
                        <span style="margin-right: 10px;"></span> <!-- Spasi -->
                        <i class="ri-chat-3-line"> 4 rb</i> <!-- Ikon untuk komentar -->
                    </div>  
                </div>
            </div>
            
            <div class="trip__card">
                <img src="assets/trip-3.jpg" alt="trip" />
                <div class="trip__details">
                    <p>The Dolomites, Italy</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>ini adalah deskripsi</p>
                    </div>
                    <div class="rating">
                        <span><i class="ri-thumb-up-line"></i>10</span> <!-- Angka rating -->
                        <span style="margin-right: 10px;"></span> <!-- Spasi -->
                        <i class="ri-chat-3-line"> 4 rb</i> <!-- Ikon untuk komentar -->
                    </div>  
                </div>
            </div>
        </div>
    </section>
 </div>
@endsection

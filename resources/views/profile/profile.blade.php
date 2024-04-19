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
                @if(auth()->check() && auth()->user()->albums)
                 <span class="number1">{{ auth()->user()->albums->count() }}</span>
                @else
                 <span class="number1">0</span>
                @endif
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Photo</span>
                @if(auth()->check() && auth()->user()->foto)
                <span class="number2">{{ auth()->user()->foto->count() }}</span>
            @else
                <span class="number2">0</span>
            @endif
            
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Like</span>
                <span class="number2">1 K</span>
            </div>

          </div>
        <!-- Button untuk membuka modal edit profil -->
        <div class="button mt-2 d-flex flex-row align-items-center">
            <a class="btn btn-sm btn-outline-primary w-100 mr-3" href="{{ route('editProfile') }}">Edit</a>
            {{-- <a class="btn btn-sm btn-outline-primary w-100">Follow</a> --}}
        </div>        
         </div>    
        </div>      
    </div>  
</div>

<div style="margin-bottom: 10px"> 
    <section class="trip" style="padding-left: 50px; padding-right: 50px;" >
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="section__title">Album Photo</h2>
            <div class="d-flex">
                <!-- Button trigger modal -->
                <a type="button" href="{{ route('exportAlbumToExcel') }}" class="btn btn-outline-success" style="margin-right: 5px;" href="#">
                    Export excel
                </a>
                <a type="button" class="btn btn-primary me-2" href="{{ route('album') }}">
                    Create album
                </a>
            </div>
        </div>
         
        
        <div class="trip__grid">
            @foreach($album as $albm)
            <div class="trip__card">
                <img src="{{ asset('storage/' . $albm->photo) }}" alt="Album Image" style="height: 230px; width: 400px;" />
                <div class="trip__details">
                    <p>{{ $albm->nama_album }}</p>
                    <div style="color: #808080; font-size: 14px;">
                        <p>{{ $albm->desc }}</p>
                    </div>
                    <div class="button mt-2 mx-1 d-flex flex-row align-items-center">
                        <a class="btn btn-sm btn-outline-primary mx-1 w-50" href="{{ route('detailalbum', $albm->id) }}">Lihat</a>
                        {{-- <a class="btn btn-sm btn-outline-success mx-1 w-50" href="#">Edit</a> --}}
                        <form action="{{ route('hapusAlbum', $albm->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1 w-200">Hapus</button>
                        </form>
                    </div>
                                 
                </div>
            </div>
            @endforeach
        </div>
        
            
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
    });
</script>
@endif
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1000 // Tampilkan pesan sukses selama 2 detik
    }).then(() => {
        window.location.href = '/explore';
    });
</script>
@endif
@endsection

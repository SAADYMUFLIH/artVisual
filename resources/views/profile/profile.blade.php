@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')

<style>
    img {
        max-width: 100%;
    }

    /* line 5, src/assets/scss/theme.scss */
    a,
    .a:hover {
        -webkit-transition: all 0.2s;
        transition: all 0.2s;
    }

    /* line 8, src/assets/scss/theme.scss */
    .container-fluid {
  width: 94%;
  margin: 0px auto;
  max-width: 94%; }

    /* line 13, src/assets/scss/theme.scss */
    .border-round-0 {
        border-radius: 0;
    }

    /* line 16, src/assets/scss/theme.scss */
    .mt-neg100 {
        margin-top: -100px;
    }

    /* line 19, src/assets/scss/theme.scss */
    .min-50vh {
        min-height: 50vh;
    }

    /* line 22, src/assets/scss/theme.scss */
    .dropdown-header {
        font-size: 1.5rem;
    }

    /* line 25, src/assets/scss/theme.scss */
    .fixed-top {
        border-bottom: 1px solid #f1f1f1;
    }

    /* line 28, src/assets/scss/theme.scss */
    footer.footer {
        border-top: 1px solid #f1f1f1;
    }

    /* line 31, src/assets/scss/theme.scss */
    /* .nav-link,
    .dropdown-item {
        font-weight: 700;
    } */

    /* line 32, src/assets/scss/theme.scss */
    .navbar {
        padding: 0.5rem 2rem;
    }

    /* line 34, src/assets/scss/theme.scss */
    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        -webkit-transition: .2s ease;
        transition: .2s ease;
        background-color: #008CBA;
    }

    /* line 46, src/assets/scss/theme.scss */
    .card {
        border: 0;
    }

    /* line 47, src/assets/scss/theme.scss */
    .card-pin:hover .overlay {
        opacity: .5;
        border: 5px solid #f3f3f3;
        -webkit-transition: ease .2s;
        transition: ease .2s;
        background-color: #000000;
        cursor: -webkit-zoom-in;
        cursor: zoom-in;
    }

    /* line 55, src/assets/scss/theme.scss */
    .more {
        color: white;
        font-size: 14px;
        position: absolute;
        bottom: 0;
        right: 0;
        text-transform: uppercase;
        -webkit-transform: translate(-20%, -20%);
        transform: translate(-20%, -20%);
        -ms-transform: translate(-50%, -50%);
    }

    /* line 66, src/assets/scss/theme.scss */
    .card-pin:hover .card-title {
        color: #ffffff;
        margin-top: 10px;
        text-align: center;
        font-size: 1.2em;
    }

    /* line 73, src/assets/scss/theme.scss */
    .card-pin:hover .more a {
        text-decoration: none;
        color: #ffffff;
    }

    /* line 78, src/assets/scss/theme.scss */
    .card-pin:hover .download a {
        text-decoration: none;
        color: #ffffff;
    }

    /* line 83, src/assets/scss/theme.scss */
    .social {
        position: relative;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    /* line 88, src/assets/scss/theme.scss */
    .social .fa {
        margin: 0 3px;
    }

    .card-columns {
        -webkit-column-count: 3;
        column-count: 5;
        -webkit-column-gap: 1.25rem;
        column-gap: 1.25rem;
        orphans: 1;
        widows: 1;
    }
</style>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="image" style="padding: 20px;">
            @if (Auth::user()->image === 'assets/profile/profile_default.jpg')
                <img src="{{ asset('assets/profile/profile_default.jpg') }}" alt="Profile Image" class="rounded" style="width: 200px; height: 160px;" >
            @else
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="rounded" style="width: 200px; height: 160px;" >
            @endif
            </div>

        <div class="ml-3 w-100">
           <h4 class="mb-0 mt-0">{{ $user->username }}</h4>
           <span class="mb-3">{{ $user->email }}</span>
           <div class="p-2 mt-4  bg-primary d-flex justify-content-between rounded text-white stats">

            <div class="d-flex flex-column">
                <span class="articles">Album</span>
                 <span class="number1">{{ $totalAlbumsCount }}</span>
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Photo</span>   
                <span class="number2">{{ $totalPhotosCount }}</span>
            </div>

            <div class="d-flex flex-column">
                <span class="followers">Like</span>
                <span class="number2">{{ $totalLikesCount }}</span>
            </div>

          </div>
        <!-- Button untuk membuka modal edit profil -->
        <div class="button mt-2 d-flex flex-row align-items-center">
           @if($isOwnProfile)
           <a class="btn btn-sm btn-outline-primary w-100 mr-3" href="{{ route('editProfile') }}">Edit</a>
           @else
           @endif
        </div>        
         </div>    
        </div>      
    </div>  
</div>

    @if(auth()->user() && auth()->user()->username === $user->username)
    <div style="margin-bottom: 10px"> 
        <section class="trip" style="padding-left: 50px; padding-right: 50px;" >
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section__title">Album Photo</h2>
                <div class="d-flex">
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-primary me-2" href="{{ route('album') }}">
                        Create album
                    </a>
                </div>
            </div>
             
            
            <div class="trip__grid">
            @if($album->count() > 0)
                @foreach($album as $albm)
                    {{-- @foreach($albm->Foto as $foto)
                    <h1>{{$albm->judul_foto}}</h1>
                    @endforeach --}}
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
                @else
                <h1>anda belum miliki album</h1>
                @endif
             </div>  
            </div>
        </section>
    </div>
    @else

    @endif

    @foreach($photos as $foto)
    <div class="container-fluid mb-5">
        <div class="row">
            <h3>Photo {{ $user->username }} </h3>
            <div class="card-columns" style="margin-top: 20px">
                @foreach ($photos as $foto)
                <div class="card card-pin">
                    <img class="card-img" src="{{asset('storage/' . $foto->file_foto)}}" alt="Card image">
                    <div class="overlay">
                        <h2 class="card-title title">{{$foto->judul_foto}}</h2>
                        <p style="color: white; font-size: 18px; text-align: center;">{{$foto->desc}}</p>
                        <div class="more">
                            <a href="{{route('showFoto' , ['id' => $foto->id])}}" class="mr-2"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Detail Foto</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    {{-- @foreach($album as $albm)
    @foreach($albm->Foto as $foto)
    <h1>{{$foto->judul_foto}}</h1>
    @endforeach
    @endforeach --}}
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

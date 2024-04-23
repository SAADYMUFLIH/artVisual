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
                <form class="d-flex" action="{{ route('users.search')}}" method="GET">
                    <input id="search" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>

            <div id="search_list">
                
            </div>
            
            <div class="trip__grid" id="photo-grid">
                @foreach($photos as $photo)
                <div class="trip__card">
                    <a href="{{ route('showFoto', ['id' => $photo->id]) }}">
                        <img src="{{ asset('storage/' . $photo->file_foto) }}" alt="{{ $photo->judul_foto }}" style="height: 230px; width: 400px;" />
                    </a>                    
                    
                    <div class="trip__details">
                        <p>{{ $photo->judul_foto }}</p>
                        <p style="font-size: 14px">{{ $photo->desc }}</p>
                        {{-- <form action="{{ route('likeFoto') }}" method="POST">
                            @csrf
                            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            <div class="like-section">
                                @if ($foto->likedByUser())
                                    <button type="submit" class="footer-action-icons" style="outline: none;">
                                        <i class="fa fa-heart" style="color: #f00030;"></i>
                                    </button>
                                @else
                                    <button type="submit" class="footer-action-icons" style="outline: none;">
                                        <i class="fa fa-heart" style="color: #ccc;"></i>
                                    </button>
                                @endif
                                <span class="like-count">{{ $foto->like()->count() }}</span>
                            </div>
                        </form>  --}}

                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>
</div>


@endsection

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


<div class="container-fluid" style="margin-top:30px;">
    <div class="row">
        <div class="card-columns">
            @foreach($photos as $foto)
            <div class="card card-pin">
                <img class="card-img" src="{{ asset('storage/' . $foto->file_foto) }}" alt="Card image">
                <div class="overlay">
                    <h2 class="card-title title">{{ $foto->judul_foto}}</h2>
                    <div class="more">
                        <form id="deleteForm" action="{{ route('deletePhoto', ['id' => $foto->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                            </button>
                        </form>                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection


@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')
    
<style>
    /* General Styling */
    a {
        text-decoration: none;
    }

    /* Instagram Card Styles */
    .Instagram-card {
        background: #ffffff;
        border: 1px solid #f2f2f2;
        border-radius: 10px;
        width: 100%;
        max-width: 900px;
        margin: auto;
        display: flex;
        overflow: auto;
    }

    .Instagram-card-header {
        padding: 0px;
        height: 40px;
    }

    .Instagram-card-user-image {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        vertical-align: middle;
    }

    .Instagram-card-time {
        float: right;
        width: 80px;
        padding-top: 10px;
        text-align: right;
        color: #999;
    }

    .Instagram-card-user-name {
        margin-left: 5px;
        font-weight: bold;
        color: #262626;
    }

    .Instagram-card-content {
        padding: 20px;
        width: 600px;
        /* height: 400px; */
    }

    .Likes {
        font-weight: bold;
    }

    .Instagram-card-content-user {
        font-weight: bold;
        color: #262626;
    }

    .hashtag {
        color: #003569;
    }

    .comments {
        color: #999;
    }

    .user-comment {
        color: #003569;
    }

    .Instagram-card-footer {
        padding: 20px;
        display: flex;
        align-items: center;
        clear: both;
    }

    hr {
        border: none;
        border-bottom: 1px solid #ccc;
        margin-top: 30px;
        margin-bottom: 0px;
        padding-bottom: 0px;
    }

    .footer-action-icons {
        font-size: 16px;
        color: #ccc;
    }

    .comments-input {
        border: none;
        margin-left: 10px;
        width: 100%;
    }

    /* Media Queries */
    @media (max-width: 1050px) {
        .container {
            grid-template-columns: repeat(3, 1fr);
        }

        .column:last-child {
            display: none;
        }
    }

    @media (max-width: 800px) {
        .container {
            grid-template-columns: repeat(2, 1fr);
        }

        .column:nth-child(3) {
            display: none;
        }
    }

    @media (max-width: 550px) {
        .container {
            grid-template-columns: 1fr;
            gap: 3em;
        }

        .column:nth-child(3) {
            display: flex;
        }

        .column:last-child {
            display: flex;
        }
    }
</style>

<style>
    /* Gaya untuk tampilan gambar penuh */
    .full-image-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .full-image-overlay img {
        max-width: 90%;
        max-height: 90%;
    }

    .like-button {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .like-button i::before {

        color: rgb(181, 176, 176); /* Warna default ikon hati sebelum diklik */
    }

    .like-button.liked i::before {
        color: red; 
    }

    /* Tampilan Komentar */
    .komentar-list {
        margin-top: 10px;
    }

    .komentar {
        margin-bottom: 5px;
    }

    .komentar strong {
        font-weight: bold;
    }


    /* Tampilan Form Komentar */
    .comments-input {
        width: 70%; /* Sesuaikan lebarnya sesuai kebutuhan */
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .comments-input:focus {
        outline: none;
        border-color: #007bff; /* Warna dapat disesuaikan */
    }

    /* Tampilan Tombol Kirim Komentar */
    form button[type="submit"] {
        background-color: #007bff; /* Warna dapat disesuaikan */
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    form button[type="submit"]:hover {
        background-color: #0056b3; /* Warna dapat disesuaikan */
    }
</style>

<div class="Instagram-card" style="margin-top: 2rem;">
    <div class="Instagram-card-image">
        <img id="foto_{{ $foto->id }}" src="{{ asset('storage/' . $foto->file_foto) }}" height="450px"
            style="width: 450px; cursor: pointer;"
            onclick="showFullImage('{{ asset('storage/' . $foto->file_foto) }}', 'foto_{{ $foto->id }}')">
    </div>
    
    <div class="Instagram-card-content">
        <div class="Instagram-card-header">
            @if ($userName)
                    <img src="{{ $userProfileImage ? asset($userProfileImage) : asset('images/default_profile.jpg') }}"
                        alt="Profile Image" class="Instagram-card-user-image"
                        onclick="showFullImage('{{ $userProfileImage ? asset($userProfileImage) : asset('images/default_profile.jpg') }}')">
                       
                        <a class="Instagram-card-user-name" href="{{ route('showUserProfile', ['username' => $user->username]) }}">
                            {{ $user->username }}
                        </a>                        
                        
            @endif

        </div>
        <p class="Likes" style="margin-top: 2rem;">{{ $foto->judul_foto }}</p>
        <p>
            <a class="Instagram-card-content-user" href="https://www.instagram.com/">
            </a>
            {{ $foto->desc}}
        </p>
        <div style="display: flex; flex-direction: row;">
            <p class="comments">{{ count($komentar) }} comments</p>
            
            @if(Auth::user() && $foto->user_id !== Auth::user()->id)
                <a type="button" class="nav-link active"  style="margin-left: auto; color:red;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Laporkan
                </a>
            @endif
        </div>
       <!-- Button trigger modal -->
  
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporFoto', ['foto_id' => $foto->id]) }}" method="POST">
                        @csrf
                        <label for="exampleFormControlSelect1">Report</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="report_id">
                            <option>-- Pilih Tipe Laporan --</option>
                            @foreach ($reports as $report)
                                <option value="{{ $report->id }}">{{ $report->report_type }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <hr>
        <div class="komentar-list" style="max-height: 200px; overflow-y: auto;">
            @foreach($komentar as $komen)
                <div class="komentar">
                    <strong>{{ $komen->user->username }}</strong>: {{ $komen->isi_komentar }}
                </div>
            @endforeach
        </div>        
        <hr>
        <div class="Instagram-card-footer">
            <!-- Tombol like -->
            <form action="{{ route('likeFoto') }}" method="POST">
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
            </form>            
        
            <!-- Formulir komentar -->
            <form action="{{ route('storeKomentar') }}" method="POST">
                @csrf
                <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                <input class="comments-input" type="text" name="isi_komentar" placeholder="Tambahkan komentar...">
                <button type="submit">Kirim</button>
            </form>
          </div>   
        </div>
      </div>
    </div>
</div>

@endsection
<!-- JavaScript untuk menampilkan modal -->
<script>
    document.getElementById("laporkan").addEventListener("click", function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
</script>
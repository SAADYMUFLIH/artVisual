@extends('admin.layout.main')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('nav')
    @include('admin.include.nav')
@endsection

@section('content')
    <section id="gallery">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                @foreach ($reportPhotos as $reportPhoto)
                    <div class="card">
                        <img src="{{ asset('storage/' . $reportPhoto->photo->file_foto) }}" alt="{{ $reportPhoto->photo->judul_foto }}" class="card-img-top" style="height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reportPhoto->photo->judul_foto }}</h5>
                            <p class="card-text">{{ $reportPhoto->keterangan }}</p>
                            <!-- Button to trigger deletion -->
                            <form action="{{ route('admin.delete', $reportPhoto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</section>
@endsection
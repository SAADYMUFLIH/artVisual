@extends('layouts.app')

@section('title', 'Landing Page')

@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')
<div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-8 offset-md-3 mt-5 mx-auto">
        <h2 class="text-center mb-4">Upload Your image Gallery</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 mb-3 h-100">
              <label for="image" class="form-label">Pilih Gambar:</label>
              <input type="file" class="form-control" id="image" style="height: 175px;" name="image" accept="image/*" required>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="title" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary  w-100">Upload</button>
        </form>
      </div>
    </div>
  </div>
@endsection

{{-- @section('footer')
    @include('includes.footer')
@endsection --}}
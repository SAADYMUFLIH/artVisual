@extends('admin.layout.main')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('nav')
    @include('admin.include.nav')
@endsection

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ route('exportAlbumToExcel') }}" class="btn btn-outline-success">Export Excel</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Nama Album</th>
                        <th scope="col">desc</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($albums as $album)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('storage/' . $album->photo) }}" alt="{{ $album->title }}" style="max-width: 50px; max-height:50px;"></td>
                        <td>{{ $album->user->username }}</td>
                        <td>{{ $album->nama_album }}</td>
                        <td>{{ $album->desc}}</td>
                    </tr>
                @endforeach               
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
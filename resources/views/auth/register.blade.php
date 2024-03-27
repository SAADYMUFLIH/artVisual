@extends('auth.layout')

@section('title', 'Register')

@section('content')

<form class="registration-form" action="{{ route('registerPost') }}" method="POST">
  @csrf
    <h2 class="text-center mb-4">Register</h2>
    <div class="form-group">
        <input type="text" class="form-control rounded" value="{{old('username')}}" name="username" placeholder="Username">
        @if ( count($errors) > 0)
        <div style="width: auto; color:red; margin-top: 0.25rem;">
          {{ $errors->first('username') }}
        </div>
      @endif
    </div>
    <div class="form-group">
        <input type="email" class="form-control rounded" value="{{old('email')}}" name="email" aria-describedby="emailHelp" placeholder="Email">
        @if ( count($errors) > 0)
          <div style="width: auto; color:red; margin-top: 0.25rem;">
            {{ $errors->first('email') }}
          </div>
        @endif
    </div>
    <div class="form-group">
        <input type="password" class="form-control rounded" value="{{old('passwrd')}}" name="password" placeholder="Password">
        @if ( count($errors) > 0)
          <div style="width: auto; color:red; margin-top: 0.25rem;">
            {{ $errors->first('password') }}
          </div>
        @endif
    </div>
    <div class="form-group">
        <input type="text" class="form-control rounded" value="{{old('nama_lengkap')}}" name="nama_lengkap" placeholder="Nama Lengkap">
        @if ( count($errors) > 0)
        <div style="width: auto; color:red; margin-top: 0.25rem;">
          {{ $errors->first('nama_lengkap') }}
        </div>
      @endif
    </div>
    <div class="form-group">
        <input type="text" class="form-control rounded" value="{{old('alamat')}}" name="alamat" placeholder="Alamat">
        @if ( count($errors) > 0)
        <div style="width: auto; color:red; margin-top: 0.25rem;">
          {{ $errors->first('alamat') }}
        </div>
      @endif
    </div>
   
    <button type="submit" class="btn btn-primary btn-block rounded-pill">Register</button>

    <div class="text-center mt-3">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
      </div>
  </form>
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
        window.location.href = '/login';
    });
</script>
@endif
@endsection

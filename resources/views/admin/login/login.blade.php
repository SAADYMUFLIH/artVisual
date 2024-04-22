<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/stylelogin.css">

   <!-- SweetAlert CDN --> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>     
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form class="login-form" method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <h2 class="text-center mb-4">Login</h2>
                <div class="form-group">
                    <input type="text" class="form-control rounded" value="{{ old('username') }}" name="username" placeholder="Username">
                    @error('username')
                    <div style="width: auto; color:red; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded" value="{{ old('password') }}" name="password" placeholder="Password">
                    @error('password')
                    <div style="width: auto; color:red; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- SweetAlert Script -->
    @yield('scripts')
</body>
</html>

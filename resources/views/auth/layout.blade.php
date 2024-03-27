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
            @yield('content')
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

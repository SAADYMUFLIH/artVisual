<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
        rel="stylesheet"
    />
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="styles.css" />

      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script> --}}


    <!-- Sertakan library Bootstrap -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        @yield('navbar')
    </nav>

@yield('content')

<footer class="footer">
    @yield('footer')
</footer>

 <!-- SweetAlert Script -->
 @yield('scripts')

<script>
    // Fungsi untuk menambahkan gambar baru
    function addNewDestination(imageSrc, title, subtitle) {
        // Buat elemen baru
        var newCard = document.createElement('div');
        newCard.className = 'destination__card';

        var img = document.createElement('img');
        img.src = imageSrc;
        img.alt = 'destination';

        var details = document.createElement('div');
        details.className = 'destination__details';

        var titlePara = document.createElement('p');
        titlePara.className = 'destination__title';
        titlePara.textContent = title;

        var subtitlePara = document.createElement('p');
        subtitlePara.className = 'destination__subtitle';
        subtitlePara.textContent = subtitle;

        // Susun elemen-elemen baru
        details.appendChild(titlePara);
        details.appendChild(subtitlePara);
        newCard.appendChild(img);
        newCard.appendChild(details);

        // Masukkan elemen baru ke dalam div .destination__grid
        var destinationGrid = document.getElementById('destinationGrid');
        destinationGrid.appendChild(newCard);
    }

    // Panggil fungsi addNewDestination untuk menambahkan gambar baru
    // Misalnya:
    // addNewDestination('assets/destination-5.jpg', 'New Destination', 'New Country');

     



</script>
</body>
</html>

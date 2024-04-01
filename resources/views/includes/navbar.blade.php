<div class="container-fluid" style="margin-top: 25px;">
    <div class="nav__logo">ArtVisualGallery<span>.</span></div>
    <div style="margin-left: 27%; margin-right: auto;"> <!-- Menambahkan properti style untuk membuat elemen menjadi terpusat secara horizontal -->
        <ul class="navbar-nav mx-auto justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('explore') }}">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('upload') }}">Upload</a>
            </li>
        </ul>
    </div>
      
    <ul class="navbar-nav ms-auto" style="margin-right: 20px;">
        @if (Auth::user())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" onclick="openDropdown()">
                <p style="color: blue">Halloo</p>,{{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="confirmLogout()">Logout</a></li>
            </ul>
          </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <li class="nav-item">
            <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login</button>
        </li>
        @endif
    </ul>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, logout!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

    function openDropdown() {
     document.getElementById("navbarDropdown").classList.toggle("show");
    }
</script>
@endsection

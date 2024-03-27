<div class="container-fluid" style="margin-top: 25px;">
    <div class="nav__logo">ArtVisualGallery<span>.</span></div>
    <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav mx-auto justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('explore') }}">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
          </ul>
    </div>
    <ul class="navbar-nav ms-auto">
        @if (Auth::user())
        <a onclick="confirmLogout()" class="dropdown-item">Logout</a>
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
</script>

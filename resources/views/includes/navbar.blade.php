<div class="container-fluid" style="margin-top: 25px;">
    <div class="nav__logo">ArtVisualGallery<span>.</span></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 13%">
        <ul class="navbar-nav mx-auto">
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('explore') }}">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('upload') }}">Upload</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @if (Auth::user())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" onclick="openDropdown()">
                    <span style="color: #3685fb; margin-bottom: 0;">Hallo,</span> {{ Auth::user()->username }}
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
</script>

{{-- <script>
    // Aktifkan dropdown pada saat dokumen dimuat
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    });
</script> --}}

@endsection

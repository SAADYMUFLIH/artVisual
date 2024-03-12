<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="nav__logo">ArtVisualGalery<span>.</span></div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto"> <!-- mx-auto untuk menu berada di tengah -->
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reviews</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav ms-auto">
      @if (Auth::user())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-blue" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="text-center">
            <p style="display: inline; color: #3685fb;">Haloo</p>, {{ Auth::user()->username }}
          </span>
        </a>        
        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </li>
      @else
      <li class="nav-item">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login</button>
      </li>      
      @endif
    </ul>
  </div>
</nav>

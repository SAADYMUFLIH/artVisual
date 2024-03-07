<div class="nav__logo">ArtVisualGalery<span>.</span></div>
<ul class="nav__links">
    <li class="link"><a href="#">Home</a></li>
    <li class="link"><a href="#">Explore</a></li>
    <li class="link"><a href="#">Pricing</a></li>
    <li class="link"><a href="#">Reviews</a></li>
</ul>
<span>
  @if (Auth::user())
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Selamat datang, {{ Auth::user()->username }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="dropdown-item-text">Selamat datang, {{ Auth::user()->username }}</p>
                </div>
                <div class="col">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @else
      <a type="button" href="{{ route('login') }}" onclick="window.location.href='{{ route('login') }}'" class="btn login">Login</a>
  @endif
</span>
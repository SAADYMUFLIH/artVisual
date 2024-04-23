<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    @if(Auth::check() && Auth::user()->isAdmin())
          <p>Selamat datang, {{ Auth::user()->username }}</p>
    @endif
        

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      
        
        <div class="topbar-divider d-none d-sm-block"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-primary">Logout</button>
        </form>
        

        <!-- Nav Item - User Information -->
       

    </ul>

</nav>
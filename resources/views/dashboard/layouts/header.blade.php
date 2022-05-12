<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">ATMA Jogja Rental | 
      @if(auth()->user()->role == '1')
        Driver
      @elseif(auth()->user()->role == '2')
        Customer
      @elseif(auth()->user()->role == '3')
        Pegawai
      @endif
    </a>

    {{-- <div class="navbar-nav">
      <div class="nav-item">
        <button type="submit" class="nav-link px-3 bg-dark border-0"><span data-feather="star"></span> </button>
      </div>
    </div> --}}

    <div class="navbar-nav">
      <div class="nav-item">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
</header>
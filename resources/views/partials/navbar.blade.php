<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">AJR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($title === "Data Customer Terdaftar") ? 'active' : '' }}" href="/customers">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Data Driver Terdaftar") ? 'active' : '' }}" href="/drivers">Driver</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Mobil") ? 'active' : '' }}" href="/mobils">Mobil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Mitra") ? 'active' : '' }}" href="/mitras">Mitra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Role") ? 'active' : '' }}" href="/roles">Role</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Pegawai") ? 'active' : '' }}" href="/pegawais">Pegawai</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Jadwal Pegawai") ? 'active' : '' }}" href="/jadwals">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Data Promo AJR") ? 'active' : '' }}" href="/promos">Promo</a>
          </li> --}}
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->nama }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Login") ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
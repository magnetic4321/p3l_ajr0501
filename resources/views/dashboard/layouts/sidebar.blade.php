<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
          <a class="nav-link {{ Request::is('dashboard/transaksis*') ? 'active' : '' }}" href="/dashboard/transaksis">
            <span data-feather="book-open"></span>
            Transaksi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mobils*') ? 'active' : '' }}" href="/dashboard/mobils">
            <span data-feather="package"></span>
            Daftar Mobil
          </a>
          <a class="nav-link {{ Request::is('dashboard/promos*') ? 'active' : '' }}" href="/dashboard/promos">
            <span data-feather="tag"></span>
            Daftar Promo
          </a>
        </li>
      </ul>

      @can('pegawai')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="users"></span>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/customers*') ? 'active' : '' }}" href="/dashboard/customers">
            <span data-feather="smile"></span>
            Customer
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/drivers*') ? 'active' : '' }}" href="/dashboard/drivers">
            <span data-feather="navigation-2"></span>
            Driver
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pegawais*') ? 'active' : '' }}" href="/dashboard/pegawais">
            <span data-feather="pocket"></span>
            Pegawai
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mitras*') ? 'active' : '' }}" href="/dashboard/mitras">
            <span data-feather="star"></span>
            Mitra
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jadwals*') ? 'active' : '' }}" href="/dashboard/jadwals">
            <span data-feather="clock"></span>
            Jadwal
          </a>
        </li>
      </ul>
      @endcan
    </div>
</nav>
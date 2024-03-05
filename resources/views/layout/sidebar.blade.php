@if (auth('admin')->check())
<div class="app-sidebar">
  <div class="logo">
    {{-- <a href="/dashboard" class="logo-icon"><span class="logo-text">Monitoring Bangkom</span></a> --}}
    <div class="sidebar-user-switcher user-activity-online">
      <a href="/dashboard">
        <img src="{{ asset('assets/images/logo.jpg') }}" width="50">
        <span class="activity-indicator"></span>
        <span class="user-info-text">{{ ucwords(auth()->guard('admin')->user()->username) }}<br><span class="user-state-info">Admin</span></span>
      </a>
    </div>
  </div>    
  <div class="app-menu">
    <ul class="accordion-menu">
      <li class="{{ (Route::currentRouteName() == 'dashboard') ? 'active-page' : '' }}">
        <a href="{{ route('dashboard') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
      </li>
    </ul>
    <ul class="accordion-menu">
      <li class="sidebar-title">
        Manajemen Pelatihan
      </li>
      <li class="{{ (Route::currentRouteName() == 'sop-pelatihan') ? 'active-page' : '' }}">
        <a href="{{ route('sop-pelatihan') }}"><i class="material-icons-two-tone">storage</i>SOP Pelatihan</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'jadwal-pelatihan') ? 'active-page' : '' }}">
        <a href="{{ route('jadwal-pelatihan') }}"><i class="material-icons-two-tone">today</i>Jadwal Pelatihan</a>
      </li>
    </ul>
    <ul class="accordion-menu">
      <li class="sidebar-title">
        Menu Pelatihan
      </li>
      {{-- <li class="{{ (Route::currentRouteName() == 'pelatihan-tambah') ? 'active-page' : '' }}">
        <a href="{{ route('pelatihan-tambah') }}"><i class="material-icons-two-tone">nature_people</i>Tambah Pelatihan</a>
      </li> --}}
      <li class="{{ (Route::currentRouteName() == 'pelatihan-berlangsung') ? 'active-page' : '' }}">
        <a href="{{ route('pelatihan-berlangsung') }}"><i class="material-icons-two-tone">assessment</i>Sedang Berlangsung</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'arsip-pelatihan') ? 'active-page' : '' }}">
        <a href="{{ route('arsip-pelatihan') }}"><i class="material-icons-two-tone">verified</i>Arsip Pelatihan</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'cetak-surat') ? 'active-page' : '' }}">
        <a href="{{ route('cetak-surat') }}"><i class="material-icons-two-tone">file_download</i>Cetak Surat</a>
      </li>
    </ul>
    <ul class="accordion-menu">
      <li class="sidebar-title">
        Pengaturan
      </li>
      <li class="{{ (Route::currentRouteName() == 'logout') ? 'active-page' : '' }}">
        <a href="{{ route('logout') }}"><i class="material-icons">logout</i>Logout</a>
      </li>
    </ul>
  </div>
</div>
@else
  <div class="app-sidebar">
    <div class="logo">
      {{-- <a href="/dashboard" class="logo-icon"><span class="logo-text">Monitoring Bangkom</span></a> --}}
      <div class="sidebar-user-switcher user-activity-online">
        <a href="/dashboard">
          <img src="{{ asset('assets/images/logo.jpg') }}" width="50">
          <span class="activity-indicator"></span>
          <span class="user-info-text">Tamu<br><span class="user-state-info">Guest</span></span>
        </a>
      </div>
    </div>
    <div class="app-menu">
      <ul class="accordion-menu">
        <li class="{{ (Route::currentRouteName() == 'pelatihan-berlangsung') ? 'active-page' : '' }}">
          <a href="{{ route('pelatihan-berlangsung') }}"><i class="material-icons-two-tone">home</i>Home</a>
        </li>
      </ul>
      <ul class="accordion-menu">
        <li class="sidebar-title">
          Pengaturan
        </li>
        <li class="{{ (Route::currentRouteName() == 'login') ? 'active-page' : '' }}">
          <a href="{{ route('login') }}"><i class="material-icons">login</i>Login</a>
        </li>
      </ul>
    </div>
  </div>

@endif
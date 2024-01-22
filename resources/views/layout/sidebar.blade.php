<div class="app-sidebar">
  <div class="logo">
    <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
    <div class="sidebar-user-switcher user-activity-online">
      <a href="#">
        <img src="{{ asset('assets/images/avatars/avatar.png') }}">
        <span class="activity-indicator"></span>
        <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
      </a>
    </div>
  </div>
  <div class="app-menu">
    <ul class="accordion-menu">
      <li class="sidebar-title">
        Apps
      </li>
      <li class="{{ (Route::currentRouteName() == 'index') ? 'active-page' : '' }}">
        <a href="{{ route('index') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'add-course') ? 'active-page' : '' }}">
        <a href="{{ route('add-course') }}"><i class="material-icons-two-tone">nature_people</i>Buat Pelatihan</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'ongoing-course') ? 'active-page' : '' }}">
        <a href="{{ route('ongoing-course') }}"><i class="material-icons-two-tone">assessment</i>Sedang Berlangsung</a>
      </li>
      <li class="{{ (Route::currentRouteName() == 'completed-course') ? 'active-page' : '' }}">
        <a href="{{ route('completed-course') }}"><i class="material-icons-two-tone">verified</i>Pelatihan Selesai</a>
      </li>
    </ul>
  </div>
</div>
<nav id="sidebar" aria-label="Main Navigation">
  <div class="content-header">
    <a class="fw-semibold text-dual" href="#">
      <span class="smini-hide">
        <i class="fa fa-circle-notch"></i>
        Absensi Online
      </span>
      <span class="smini-hide fs-5 tracking-wider">
        <!-- <img src="{{ asset('assets/src/favicons/favicon.png') }}" alt="micromacro">  -->
      </span>
    </a>
    <div>
      <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
        <i class="fa fa-fw fa-times"></i>
      </a>
    </div>
  </div>

  <!-- Sidebar Scrolling -->
  <div class="js-sidebar-scroll">
    <!-- Side Navigation -->
    <div class="content-side">
      <ul class="nav-main">
        
        <li class="nav-main-item">
          <a class="nav-main-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="nav-main-link-icon si si-speedometer"></i>
            <span class="nav-main-link-name">Dashboard</span>
          </a>
        </li>

        <li class="nav-main-item">
          <a class="nav-main-link {{ Request::is('chek-in') ? 'active' : '' }}" href="{{ route('checkIn') }}">
            <i class="nav-main-link-icon fa fa-user"></i>
            <span class="nav-main-link-name">Check In</span>
          </a>
        </li>

        <li class="nav-main-item">
          <a class="nav-main-link {{ Request::is('raport') ? 'active' : '' }}" href="raport">
            <i class="nav-main-link-icon fa fa-user"></i>
            <span class="nav-main-link-name">Raport</span>
          </a>
        </li>


      </ul>
    </div>
    <!-- END Side Navigation -->
  </div>
  <!-- END Sidebar Scrolling -->
</nav>
<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    {{-- <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
      </div>
    </div> --}}
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Place this tag where you want the button to render. -->
      {{-- <li class="nav-item lh-1 me-3">
        <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
      </li> --}}

      <!-- User -->
<li class="nav-item">
</li>
<li class="nav-item ms-3">
  <a class="nav-link" href="{{ route('profile.index') }}">
    <i class="bx bx-user me-2"></i>
    <span class="align-middle">My Profile</span>
  </a>
</li>
<li class="nav-item">
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="nav-link btn btn-link" type="submit">
      <i class="bx bx-power-off me-2"></i>
      <span class="align-middle">Log Out</span>
    </button>
  </form>
</li>
<!--/ User -->

    </ul>
  </div>
</nav>
<!-- / Navbar -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


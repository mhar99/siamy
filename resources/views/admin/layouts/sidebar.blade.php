<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/siswa" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-account-box"></i>
          <span class="menu-title" style="margin-left: 11%">Data Siswa</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
        <!-- <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div> -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/kelas" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Data Kelas</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
        <!-- <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
          </ul>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link"  href="/guru" aria-expanded="false" aria-controls="charts">
          <i class="mdi mdi-account-card-details"></i>
          <span class="menu-title" style="margin-left:11%">Data Guru</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="/mapel" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-book-open-page-variant"></i>
          <span class="menu-title" style="margin-left: 11%">Data Mata Pelajaran</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="/jampelajaran" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 mdi mdi-alarm"></i><br>
          <span class="menu-title" style="margin-left: 11%">Data Jam Pelajaran</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="/tahunajaran" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-calendar"></i>
          <span class="menu-title" style="margin-left: 11%">Data Tahun Ajaran</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link"  href="/semester" aria-expanded="false" aria-controls="tables">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Kelola Semester</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="/jadwal" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-calendar-clock"></i>
          <span class="menu-title" style="margin-left: 11%">Data Jadwal</span>
          <!-- <i class="menu-arrow"></i> -->
        </a>
      </li>
      @if (Str::length(Auth::guard('sadmin')->user()) > 0)
      @if (Auth::guard('sadmin')->user()->level = "super")
      <li class="nav-item">
        <a class="nav-link"  href="/admin" aria-expanded="false" aria-controls="icons">
          <i class="mdi mdi-account-multiple"></i>
          <span class="menu-title" style="margin-left: 11%">Data Admin</span>
        </a>
      </li>
      @endif
      @endif
  </nav>
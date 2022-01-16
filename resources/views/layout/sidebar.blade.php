<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">WebCam Snapshot</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Customer</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('/data-customer') }}">Data Customer</a></li>
          </ul>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('import-data') }}">Import Excel</a></li>
          </ul>
        </li>
        <li class="menu-header">Barcode</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-qrcode"></i> <span>Barcode</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('data-barang') }}">Data Barang</a></li>
          </ul>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('scanBarcode') }}">Scan Barang</a></li>
          </ul>
        </li>
        <li class="menu-header">Location</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-map-marker-alt"></i> <span>Location</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('data-toko') }}">Data Toko</a></li>
          </ul>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('titik-kunjungan') }}">Titik Kunjungan</a></li>
          </ul>
        </li>
        <li class="menu-header">Scoreboard</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>Scoreboard</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('scoreboard') }}">ScoreBoard</a></li>
          </ul>
        </li>
        <li class="menu-header">CURL</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class=""></i> <span>CURL</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('curlBooks') }}">CURL </a></li>
          </ul>
        </li>     
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ url('home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-home"></i> Home</a>
      </div>
      </ul>

  </aside>
</div>
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"><img src="{{asset('stisla/assets/img/logo.png')}}" class="img-fluid" width="70" height="70"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">AMPI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Admin</li>
        <li><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        {{-- <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li> --}}
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master Data</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('admin.bidang')}}">Bidang</a></li>
              {{-- <li><a class="nav-link" href="{{route('admin.pendaftar')}}">Pendaftaran Anggota</a></li> --}}
              <li><a class="nav-link" href="{{route('admin.anggota')}}">Anggota</a></li>
              <li><a class="nav-link" href="{{route('admin.config')}}">Config</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check"></i><span>Data Transaksi</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('admin.event')}}">Event</a></li>
              <li><a class="nav-link" href="{{route('admin.kategori')}}">Kategori</a></li>
              <li><a class="nav-link" href="{{route('admin.kas')}}">Transaksi</a></li>
              <li><a class="nav-link" href="{{route('admin.laporan')}}">Laporan</a></li>
            </ul>
        </li>
        
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-blog"></i><span>Konten</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('admin.kegiatan')}}">Kegiatan</a></li>
              <li><a class="nav-link" href="{{route('admin.gallery')}}">Gallery</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Management Website</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('admin.slider')}}">Slider Header</a></li>
              <li><a class="nav-link" href="{{route('admin.sliderMini')}}">Slider</a></li>
              <li><a class="nav-link" href="{{route('admin.config.web')}}">Config</a></li>

            </ul>
        </li>
        <li><a class="nav-link" href="{{route('bantuan')}}"><i class="fas fa-question-circle"></i> <span>Bantuan</span></a></li>
  </aside>
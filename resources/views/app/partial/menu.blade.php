<!-- <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="assets/index.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v1</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="assets/index2.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v2</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="assets/index3.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v3</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="../widgets.html" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Widgets
      <span class="right badge badge-danger">New</span>
    </p>
  </a>
</li> -->

@if(session()->get("level") == "super_admin")
<li class="nav-item">
  <a href="{{route("super")}}" class="nav-link">
    <i class="nav-icon fas fa-home"></i>
    <p>Beranda</p>
  </a>
</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Data Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route("super.jenis")}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Jenis Arsip</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route("super.akun")}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Akun</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="{{route("super.suratkeluar")}}" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Arsip Keluar</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route("super")}}" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Arsip Tertahan</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route("logout")}}" class="nav-link">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>Logout</p>
  </a>
</li>
@elseif(in_array(session()->get("level"),['tata_usaha','kepala_sekolah','guru','wakil_kepala_sekolah','staff_lain']))
@else
<li class="nav-item">
  <a href="{{route("login")}}" class="nav-link">
    <i class="nav-icon fas fa-sign-in-alt"></i>
    <p>Login</p>
  </a>
</li>
@endif

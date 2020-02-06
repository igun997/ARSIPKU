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
@elseif(in_array(session()->get("level"),['tata_usaha','kepala_sekolah','guru','wakil_kepala_sekolah','staff_lain']))
@else
<li class="nav-item">
  <a href="../widgets.html" class="nav-link">
    <i class="nav-icon fas fa-sign-in-alt"></i>
    <p>Login</p>
  </a>
</li>
@endif

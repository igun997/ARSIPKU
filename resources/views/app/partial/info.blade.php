@if(in_array(session()->get("level"),['super_admin','tata_usaha','kepala_sekolah','guru','wakil_kepala_sekolah','staff_lain']))
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{Gravatar::get(session()->get("email"))}}" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">{{session()->get("nama")}}</a>
  </div>
</div>
@endif

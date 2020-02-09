@extends('app.layout')

@section('title')
{{$title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
  <div class="col-6 offset-3">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body">
          <form class="" action="{{$action}}" method="post">
            @csrf
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" required value="{{@$data->nama}}">
            </div>
            <div class="form-group">
              <label>Inisial Surat</label>
              <input type="text" class="form-control" name="inisial_surat" required value="{{@$data->inisial_surat}}">
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input type="text" class="form-control" name="no_hp"  value="{{@$data->no_hp}}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" required value="{{@$data->email}}">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" required value="{{@$data->username}}">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" required value="{{@$data->password}}">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                @if(isset($data->status))
                @if($data->status == 1)
                <option value="1" selected>Aktif</option>
                <option value="0">Tidak Aktif</option>
                @else
                <option value="1">Aktif</option>
                <option value="0" selected>Tidak Aktif</option>
                @endif
                @else
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select class="form-control" name="level">
                <option value="super_admin">Super Admin</option>
                <option value="staff_lain">Staff Lain</option>
              </select>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success" >Simpan Data </button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">


</script>
@endsection

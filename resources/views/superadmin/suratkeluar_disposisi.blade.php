@extends('app.layout')

@section('title')
{{$title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
  <div class="col-8 offset-2">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Kode Arsip</label>
                <input type="text" class="form-control" value="{{$data->kode_surat}}" placeholder="" disabled>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Judul Arsip</label>
                <input type="text" class="form-control" value="{{$data->judul_surat}}" placeholder="" disabled>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Dikeluarkan Oleh </label>
                <input type="text" class="form-control" value="{{$data->user->nama}}" placeholder="" disabled>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Status </label>
                <input type="text" class="form-control" value="{{(($data->arsip_locks->count() > 0?"Closed":"Buka"))}}" placeholder="" disabled>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Catatan</label>
                <textarea disabled class="form-control" rows="8" cols="80">{{$data->catatan}}</textarea>
              </div>
            </div>
          </div>
          <form  action="" id="disposisi" onsubmit="return false" method="post">
            @csrf
            <input type="text" hidden name="kode_surat" value="{{$data->kode_surat}}">
            <div class="row">
              <div class="col-12">
                <label>Data Akun</label>
                <table class="table">
                  <thead>
                    <th></th>
                    <th>Nama</th>
                    <th>Level</th>
                  </thead>
                  <tbody>
                    @foreach($listaccount as $key => $value)
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="selected[]" value="{{$value->id}}">
                        </div>
                      </td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->level}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-success">
                    Simpan Data
                  </button>
                </div>
              </div>
              <div class="col-12">
                <label>Riwayat Disposisi</label>
                <table class="table">
                  <thead>
                    <th>Kepada</th>
                    <th>Status</th>
                    <th>Tgl. Konfirmasi</th>
                    <th>Tgl. Kirim</th>
                    <th>Catatan</th>
                  </thead>
                  <tbody>
                    @foreach($data->arsip_disposisis as $key => $value)
                    <tr>
                      <td>{{$value->user->nama}}</td>
                      <td>{{(($value->user_konf == 1 )?"Sudah Dikonfirmasi":"Belum Dikonfirmasi")}}</td>
                      <td>{{(($value->tgl_konf != null)?$value->tgl_konf->format("d/m/Y"):"-")}}</td>
                      <td>{{$value->tgl_kirim->format("d/m/Y")}}</td>
                      <td>{{$value->catatan}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $("table").DataTable({

    });
    $("table").css('width', '100%');
    $("#disposisi").on('submit', function(event) {
      event.preventDefault();
      dform = $(this).serializeArray();

      console.log(dform);
      $.post("{{route("super.api.suratkeluar.disposisi.insert")}}",dform,function(r){
        if (r.status == 1) {
          toastr.success("Insert Data Gagal");
        }else {
          toastr.error("Data Error");
        }
        setTimeout(function () {
          location.reload();
        }, 1000);
      }).fail(function(){
        toastr.error("Data Error");
      })
    });
  });

</script>
@endsection

@extends('app.layout')

@section('title')
{{$title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body table-responsive">
          <a href="{{route("super.suratkeluar.add")}}" class="btn btn-primary mb-4">Tambah</a>
          <table class="table " id="dtable">
            <thead>
              <th>No</th>
              <th>Kode</th>
              <th>Judul</th>
              <th>Jenis</th>
              <th>File Surat (WORD)</th>
              <th>File Surat (PDF)</th>
              <th>Catatan</th>
              <th>Dikeluarkan Oleh</th>
              <th>Status</th>
              <th>Dibuat</th>
              <th></th>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    var btn = function(id,status){
      var item = [];
      $obj = $(status);
      item.push('<a class="dropdown-item detail" data-id="'+id+'" href="javascript:void(0)" >Detail Proses</a>');
      item.push('<a class="dropdown-item dword" data-id="'+id+'" href="javascript:void(0)" >Download WORD</a>');
      item.push('<a class="dropdown-item dpdf" data-id="'+id+'" href="javascript:void(0)" >Download PDF</a>');

      if ($obj.text() == "Open") {
        item.push('<a class="dropdown-item pdisposisi" data-id="'+id+'" href="javascript:void(0)" >Proses Disposisi</a>');
        item.push('<a class="dropdown-item kunci_temporary" data-id="'+id+'" href="javascript:void(0)" >Kunci Temporary</a>');
        item.push('<a class="dropdown-item kunci_permanent" data-id="'+id+'" href="javascript:void(0)" >Kunci Permanent</a>');
      }else if ($obj.text() == "Kunci Sementara") {
        item.push('<a class="dropdown-item buka_kunci" data-id="'+id+'" href="javascript:void(0)" >Buka Kunci</a>');
        item.push('<a class="dropdown-item kunci_permanent" data-id="'+id+'" href="javascript:void(0)" >Kunci Permanent</a>');
      }
      return '<button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button><div class="dropdown-menu dropdown-menu-right">'+item.join("")+' </div>';
    };
    var dt = $("#dtable").DataTable({
      ajax:"{{route("super.api.suratkeluar")}}",
      createdRow:function(r,d,i){
        $("td",r).eq(4).html(((d[4] != "")?"<span class='badge badge-success'>Ada</span>":"<span class='badge badge-danger'>Tidak Ada</span>"));
        $("td",r).eq(5).html(((d[5] != "")?"<span class='badge badge-success'>Ada</span>":"<span class='badge badge-danger'>Tidak Ada</span>"));
        $("td",r).eq(10).html(btn(d[10],d[8]));
      }
    });
    $("#dtable").on("click", ".dword", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("super.suratkeluar.word.download")}}?id="+id;
    })
    $("#dtable").on('click', '.kunci_temporary', function(event) {
      event.preventDefault();
      id = $(this).data("id");
      c = confirm("Apakah Anda Yakin Akan Mengunci Arsip Sementara ?");
      if (c) {
        $.post('{{route("super.suratkeluar.lock_temp")}}',{kode_surat:id}, function(r) {
          if (r.status == 1) {
            toastr.success("Sukses Kunci Arsip");
          }else {
            toastr.error("Gagal Kunci Arsip");
          }
          dt.ajax.reload();
        });
      }
    });
    $("#dtable").on('click', '.kunci_permanent', function(event) {
      event.preventDefault();
      id = $(this).data("id");
      c = confirm("Apakah Anda Yakin Akan Mengunci Arsip Permananen ? Perubahan Tidak Dapat Dilakukan Kembali ");
      if (c) {
        $.post('{{route("super.suratkeluar.lock_permanent")}}',{kode_surat:id}, function(r) {
          if (r.status == 1) {
            toastr.success("Sukses Kunci Arsip");
          }else {
            toastr.error("Gagal Kunci Arsip");
          }
          dt.ajax.reload();
        });
      }
    });
    $("#dtable").on('click', '.buka_kunci', function(event) {
      event.preventDefault();
      id = $(this).data("id");
      c = confirm("Apakah Anda Yakin Akan Membuka Kunci Kembali ? ");
      if (c) {
        $.post('{{route("super.suratkeluar.open_lock")}}',{kode_surat:id}, function(r) {
          if (r.status == 1) {
            toastr.success("Sukses Buka Kunci Arsip");
          }else {
            toastr.error("Gagal Buka Kunci Arsip");
          }
          dt.ajax.reload();
        });
      }
    });
    $("#dtable").on("click", ".dpdf", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("super.suratkeluar.pdf.generate")}}?id="+id;
    })
    $("#dtable").on("click", ".detail", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("super.suratkeluar.detail")}}?id="+id;
    })
    $("#dtable").on("click", ".pdisposisi", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("super.suratkeluar.disposisi")}}?id="+id;
    })
  });

</script>
@endsection

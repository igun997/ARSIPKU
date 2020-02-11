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
          <a href="{{route("staff.suratkeluar.add")}}" class="btn btn-primary mb-4">Tambah</a>
          <table class="table" id="dtable">
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
    var btn = function(id){
      var item = [];
      item.push('<a class="dropdown-item detail" data-id="'+id+'" href="javascript:void(0)" >Detail</a>');
      item.push('<a class="dropdown-item dword" data-id="'+id+'" href="javascript:void(0)" >Download WORD</a>');
      return '<button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button><div class="dropdown-menu dropdown-menu-right">'+item.join("")+' </div>';
    };
    var dt = $("#dtable").DataTable({
      ajax:"{{route("staff.api.suratkeluar",session()->get("id"))}}",
      createdRow:function(r,d,i){

        $("td",r).eq(4).html(((d[4] != "")?"<span class='badge badge-success'>Ada</span>":"<span class='badge badge-danger'>Tidak Ada</span>"));
        $("td",r).eq(5).html(((d[5] != "")?"<span class='badge badge-success'>Ada</span>":"<span class='badge badge-danger'>Tidak Ada</span>"));
        $("td",r).eq(10).html(btn(d[10]));
      }
    });
    $("#dtable").on("click", ".detail", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("staff.suratkeluar.detail")}}?id="+id;
    })
    $("#dtable").on("click", ".dword", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("staff.suratkeluar.word.download")}}?id="+id;
    })

  });

</script>
@endsection

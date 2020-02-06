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
          <a href="{{route("super.jenis.add")}}" class="btn btn-primary mb-4">Tambah</a>
          <table class="table" id="dtable">
            <thead>
              <th>No</th>
              <th>Kode</th>
              <th>Nama</th>
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
      item.push('<a class="dropdown-item ubah" data-id="'+id+'" href="javascript:void(0)" >Ubah</a>');
      item.push('<a class="dropdown-item hapus" data-id="'+id+'" href="javascript:void(0)" >Hapus</a>');
      return '<button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button><div class="dropdown-menu dropdown-menu-right">'+item.join("")+' </div>';
    };
    var dt = $("#dtable").DataTable({
      ajax:"{{route("super.api.jenis")}}",
      createdRow:function(r,d,i){
        $("td",r).eq(3).html(btn(d[3]));
      }
    });
    $("#dtable").on("click", ".ubah", function(event) {
      id = $(this).data("id");
      console.log(id);
      location.href = "{{route("super.jenis.update")}}/"+id;
    })
    $("#dtable").on("click", ".hapus", function(event) {
      id = $(this).data("id");
      console.log(id);

      location.href = "{{route("super.jenis.delete")}}/"+id;
    })
  });

</script>
@endsection

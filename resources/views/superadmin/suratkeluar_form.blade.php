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
            <form class="" action="{{$action}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Kode Surat</label>
                    <input type="text" class="form-control" name="kode_surat" readonly id="kode_surat" value="{{old("kode_surat")}}" placeholder="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Jenis Surat</label>
                    <select class="form-control" name="jenis_id"  id="jenis_id">
                      <option value="" selected>== Pilih ==</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Judul Surat</label>
                    <input type="text" class="form-control" name="judul_surat" id="judul_surat"  placeholder="" value="{{old("judul_surat")}}" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label>File Arsip (Word)</label>
                    <input type="file" class="form-control-file" name="file_surat" id="file_surat" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document" placeholder="" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label>File Arsip (PDF)</label>
                    <input type="file" class="form-control-file" name="file_surat_pdf" id="file_surat_pdf" accept="application/pdf" placeholder="" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Catatan </label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="8" cols="80" placeholder="Contoh : Kirimkan Surat Ini Kepada Kepala Sekolah" required>{{old("catatan")}}</textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" >Simpan Data </button>
                  </div>
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
    async function read_jenis(){
      $url = "{{route("super.api.suratkeluar.jenis.list",1)}}";
      list = await $.get($url).then();
      $.each(list,function(index, el) {
        $("#jenis_id").append('<option value="'+el.id+'">'+el.nama_jenis+'</option>');
      });
    }
    read_jenis();
    $("#jenis_id").on('change', async function(event) {
      event.preventDefault();
      id = $(this).val();
      if (id != "") {
        getid = await $.get("{{route("super.api.suratkeluar.jenis.get")}}/"+id).then();
        counter = await $.get("{{route("super.api.suratkeluar.api_countsurat")}}?id="+id).then();
        $("#kode_surat").val(counter);
      }
    });
  });

</script>
@endsection

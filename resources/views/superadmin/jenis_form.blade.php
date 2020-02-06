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
              <label>Nama Jenis</label>
              <input type="text" class="form-control" name="nama_jenis" required value="{{@$data->nama_jenis}}">
            </div>
            <div class="form-group">
              <label>Kode Jenis</label>
              <input type="text" class="form-control" name="kode_jenis" required value="{{@$data->kode_jenis}}">
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

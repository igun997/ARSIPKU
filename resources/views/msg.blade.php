@if (\Session::has('msg'))
<script type="text/javascript">
  toastr.success("{!! \Session::get('msg') !!}");
</script>
@endif
@if(count($errors->all()) > 0)
<script type="text/javascript">
  // alert("{!!json_encode($errors->all())!!}");
  @foreach ($errors->all() as $error)
  toastr.error("{!! $error !!}");
  @endforeach
</script>
@endif

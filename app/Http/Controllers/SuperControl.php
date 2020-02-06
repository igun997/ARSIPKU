<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\{Arsip,ArsipDisposisi,ArsipLock,Jeni,User};
class SuperControl extends Controller
{
    public function index()
    {
      return view("superadmin.home")->with(["title"=>"Dashboard Super Admin"]);
    }
    public function jenis_read()
    {

      return view("superadmin.jenis")->with(["title"=>"Data Jenis Arsip"]);

    }
    
    public function jenis_add()
    {
      return view("superadmin.jenis_form")->with(["title"=>"Data Jenis","action"=>route("super.jenis.add")]);
    }
    public function jenis_show($id)
    {
      $find = Jeni::where(["id"=>$id]);
      if ($find->count() > 0) {
        $data = $find->first();
        return view("superadmin.jenis_form")->with(["title"=>"Ubah Data Jenis","data"=>$data,"action"=>route("super.jenis.update",$id)]);
      }else {
        return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
      }
    }
    public function jenis_update(Request $req,$id)
    {
      $req->validate([
        "nama_jenis"=>"required",
        "kode_jenis"=>"required",
      ]);
      $data = $req->all();
      unset($data["_token"]);
      $ins = Jeni::where(["id"=>$id])->update($data);
      if ($ins) {
        return redirect(route("super.jenis"))->with(["msg"=>"Data Berhasil Di Simpan"]);
      }else {
        return back()->withErrors(["msg"=>"Koneksi Dengan Database Terputus"]);
      }
    }
    public function jenis_delete($id)
    {
      $del = Jeni::find($id)->delete();
      return back()->with(["msg"=>"Data Berhasil Di Hapus"]);
    }
    public function jenis_add_action(Request $req)
    {
      $req->validate([
        "nama_jenis"=>"required",
        "kode_jenis"=>"required",
      ]);
      $ins = Jeni::create($req->all());
      if ($ins) {
        return redirect(route("super.jenis"))->with(["msg"=>"Data Berhasil Di Simpan"]);
      }else {
        return back()->withErrors(["msg"=>"Koneksi Dengan Database Terputus"]);
      }
    }
}

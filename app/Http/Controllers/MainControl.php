<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Arsip,ArsipDisposisi,ArsipLock,Jeni,User};
use \Creativeorange\Gravatar\Facades\Gravatar;
class MainControl extends Controller
{
    public function login()
    {
      return view("login")->with(["title"=>"Halaman Masuk"]);
    }
    public function login_act(Request $req)
    {
      $req->validate([
        "username"=>"required",
        "password"=>"required"
      ]);
      $obj = User::where(["username"=>$req->username,"password"=>$req->password]);
      if ($obj->count() > 0) {
        $row = $obj->first();
        session(["nama"=>$row->nama,"id"=>$row->id,"email"=>$row->email,"level"=>$row->level]);
        $rute = "staff";
        if ($row->level == "super_admin") {
          $rute = "super";
        }
        return redirect(route($rute))->with(["msg"=>"Anda Berhasil Login"]);
      }else {
        return back()->withErrors(["msg"=>"Username dan Password anda Salah"]);
      }
    }
}

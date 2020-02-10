<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Arsip,ArsipDisposisi,ArsipLock,Jeni,User};
class StaffControl extends Controller
{
    public function index()
    {
      $data = ["title"=>"Beranda Staff"];
      return view("staff.home")->with($data);
    }
    public function suratkeluar_read()
    {
      $data = ["title"=>"Data Surat Keluar"];
      return view("staff.suratkeluar")->with($data);
    }
    public function suratkeluar_add()
    {
      $data = ["title"=>"Tambah Surat Keluar","action"=>route("staff.suratkeluar.add")];
      return view("staff.suratkeluar_form")->with($data);
    }
}

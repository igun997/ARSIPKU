<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Arsip,ArsipDisposisi,ArsipLock,Jeni,User};
use setasign\Fpdi\Fpdi;
use QrCode;
use File;
use setasign\Fpdi\PdfReader;
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
    public function api_jenisread($isList = 0)
    {
      $get = Jeni::all();
      if ($isList == 1) {
        return $get;
      }
      $data = [];
      $data["data"] = [];
      foreach ($get as $key => $value) {
        $data["data"][]= [($key+1),$value->kode_jenis,$value->nama_jenis,$value->id];
      }
      return $data;
    }
    public function api_jenisgetfirst($id)
    {
      $data = Jeni::where(["id"=>$id])->first();
      return $data;
    }
    public function api_countsurat(Request $req)
    {
      $romawi = ["I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
      $count = Arsip::where(["jenis_id"=>$req->id]);
      $hitung = ($count->count()+1);
      $re = Jeni::where(["id"=>$req->id])->first()->kode_jenis;
      $new = str_replace("{NUM}",STR_PAD(($hitung),3,0,STR_PAD_LEFT),$re)."/".($romawi[(date("m")-1)])."/".date("Y");
      return $new;
    }
    public function api_suratkeluarread()
    {
      $get = Arsip::all();
      $data = [];
      $data["data"] = [];
      foreach ($get as $key => $value) {
        $data["data"][]= [($key+1),$value->kode_surat,$value->judul_surat,$value->jeni->nama_jenis,$value->file_surat,$value->file_surat_pdf,$value->catatan,$value->user->nama,$value->dibuat->format("d/m/Y"),$value->kode_surat];
      }
      return $data;
    }
    public function suratkeluar_add(Request $req)
    {
      $req->validate([
        "kode_surat"=>"required|unique:arsip,kode_surat",
        "file_surat"=>"required|mimes:doc,docx",
        "file_surat_pdf"=>"required|mimes:pdf",
        "catatan"=>"required|min:10",
        "judul_surat"=>"required|min:4",
      ]);
      $data = $req->all();
      $id = session()->get("id");
      $data["users_id"] = $id;
      $tujuan_upload = "upload";
      $kodeFile = (explode("/",$data["kode_surat"]))[0];
      if ($req->has("file_surat")) {
        $file = $req->file('file_surat');
        $nama = str_replace(".","_",$kodeFile)."_".time().".".$file->getClientOriginalExtension();
        $file->move($tujuan_upload,$nama);
        $data["file_surat"] = $nama;
      }
      if ($req->has("file_surat_pdf")) {
        $file = $req->file('file_surat_pdf');
        $nama = str_replace(".","_",$kodeFile)."_".time().".".$file->getClientOriginalExtension();
        $file->move($tujuan_upload,$nama);
        $data["file_surat_pdf"] = $nama;
      }
      $ins = Arsip::create($data);
      if ($ins) {
        return back()->with(["msg"=>"Simpan Data Berhasil"]);
      }else {
        return back()->withErrors(["msg"=>"Simpan Data Gagal"]);
      }
    }
    public function dword(Request $req)
    {
      $id = $req->id;
      $find = Arsip::where(["kode_surat"=>$id]);
      if ($find->count() > 0) {
        return redirect(url("upload/".$find->first()->file_surat));
      }else {
        return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
      }
    }
    public function dpdf(Request $req)
    {
      $id = $req->id;
      $find = Arsip::where(["kode_surat"=>$id]);
      $temp = public_path("temp");
      $unique = base64_encode($id).".png";
      if ($find->count() > 0) {
        $path = public_path("upload/".$find->first()->file_surat_pdf);
        // return redirect($path);
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($path);
        $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf->addPage();
        $pdf->useImportedPage($pageId, 0, 0, null);
        $pdf->SetXY(10,0);
        $image = base64_encode(QrCode::size(900)->format('png')->generate($id));
        File::put($temp."/".$unique, base64_decode($image));;
        $pdf->Image(public_path("temp/".$unique), 0, $pdf->GetY(), 15);
        unlink($temp."/".$unique);
        // $pdf->Image(public_path("assets/img/logo.jpg"), 50, 50, 10, '', '', 'http://www.tcpdf.org', '', false, 300);
        $pdf->Output();
      }else {
        return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
      }
    }

}

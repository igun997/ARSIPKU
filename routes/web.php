<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/",function(){
  return redirect(route("login"));
});
Route::get("/logout",function(){
  session()->flush();
  return redirect(route("login"));
})->name("logout");
Route::get("/login","MainControl@login")->name("login");
Route::post("/login","MainControl@login_act")->name("login_act");
Route::group(['middleware' => ['staff_lain']], function () {
    Route::get("/staff","StaffControl@index")->name("staff");
    Route::get("/staff/suratkeluar","StaffControl@suratkeluar_read")->name("staff.suratkeluar");
    Route::get("/staff/api/suratkeluar/{id?}","MainControl@api_suratkeluarread")->name("staff.api.suratkeluar");
    Route::get("/staff/suratkeluar/add","StaffControl@suratkeluar_add")->name("staff.suratkeluar.add");
    Route::get("/staff/api/suratkeluar/jenis/list/{id?}","MainControl@api_jenisread")->name("staff.api.suratkeluar.jenis.list");

    Route::get("/staff/suratkeluar/disposisi/detail","MainControl@suratkeluar_detail")->name("staff.suratkeluar.detail");
    Route::get("/staff/api/suratkeluar/get/jenis/{id?}","MainControl@api_jenisgetfirst")->name("staff.api.suratkeluar.jenis.get");
    Route::get("/staff/api/suratkeluar/count/jenis","MainControl@api_countsurat")->name("staff.api.suratkeluar.api_countsurat");
    Route::post("/staff/suratkeluar/add","MainControl@suratkeluar_add")->name("staff.suratkeluar.add");

    Route::get("/staff/suratkeluar/dword","MainControl@dword")->name("staff.suratkeluar.word.download");
    Route::get("/staff/suratkeluar/dpdf","MainControl@dpdf")->name("staff.suratkeluar.pdf.generate");
    Route::get("/staff/suratkeluar/detail/{id?}","StaffControl@suratkeluar_show")->name("staff.suratkeluar.update");
    Route::post("/staff/suratkeluar/detail/{id?}","StaffControl@suratkeluar_update")->name("staff.suratkeluar.update");
    Route::get("/staff/suratkeluar/delete/{id?}","StaffControl@suratkeluar_delete")->name("staff.suratkeluar.delete");
});
Route::group(['middleware' => ['super_admin']], function () {
  Route::get("/super","SuperControl@index")->name("super");
  //Jenis
  Route::get("/super/jenis","SuperControl@jenis_read")->name("super.jenis");
  Route::get("/super/api/jenis","MainControl@api_jenisread")->name("super.api.jenis");
  Route::get("/super/jenis/add","SuperControl@jenis_add")->name("super.jenis.add");
  Route::post("/super/jenis/add","SuperControl@jenis_add_action")->name("super.jenis.add");
  Route::get("/super/jenis/detail/{id?}","SuperControl@jenis_show")->name("super.jenis.update");
  Route::post("/super/jenis/detail/{id?}","SuperControl@jenis_update")->name("super.jenis.update");
  Route::get("/super/jenis/delete/{id?}","SuperControl@jenis_delete")->name("super.jenis.delete");

  Route::post("/super/api/suratkeluar/api_disposisi","SuperControl@api_disposisi")->name("super.api.suratkeluar.disposisi.insert");
  Route::get("/super/suratkeluar/disposisi/detail","MainControl@suratkeluar_detail")->name("super.suratkeluar.detail");
  Route::post("/super/suratkeluar/disposisi/lock_temp","SuperControl@lock_temp")->name("super.suratkeluar.lock_temp");
  Route::post("/super/suratkeluar/disposisi/lock_permanent","SuperControl@lock_permanent")->name("super.suratkeluar.lock_permanent");
  Route::post("/super/suratkeluar/disposisi/open_lock","SuperControl@open_lock")->name("super.suratkeluar.open_lock");


  Route::get("/super/akun","SuperControl@akun_read")->name("super.akun");
  Route::get("/super/api/akun","MainControl@api_akunread")->name("super.api.akun");
  Route::get("/super/akun/add","SuperControl@akun_add")->name("super.akun.add");
  Route::post("/super/akun/add","SuperControl@akun_add_action")->name("super.akun.add");
  Route::get("/super/akun/detail/{id?}","SuperControl@akun_show")->name("super.akun.update");
  Route::post("/super/akun/detail/{id?}","SuperControl@akun_update")->name("super.akun.update");
  Route::get("/super/akun/delete/{id?}","SuperControl@akun_delete")->name("super.akun.delete");

  Route::get("/super/suratkeluar","SuperControl@suratkeluar_read")->name("super.suratkeluar");
  Route::get("/super/suratkeluar/disposisi","SuperControl@suratkeluar_disposisi")->name("super.suratkeluar.disposisi");
  Route::get("/super/api/suratkeluar","MainControl@api_suratkeluarread")->name("super.api.suratkeluar");
  Route::get("/super/suratkeluar/add","SuperControl@suratkeluar_add")->name("super.suratkeluar.add");
  Route::get("/super/api/suratkeluar/jenis/list/{id?}","MainControl@api_jenisread")->name("super.api.suratkeluar.jenis.list");

  Route::get("/super/api/suratkeluar/get/jenis/{id?}","MainControl@api_jenisgetfirst")->name("super.api.suratkeluar.jenis.get");
  Route::get("/super/api/suratkeluar/count/jenis","MainControl@api_countsurat")->name("super.api.suratkeluar.api_countsurat");
  Route::post("/super/suratkeluar/add","MainControl@suratkeluar_add")->name("super.suratkeluar.add");

  Route::get("/super/suratkeluar/dword","MainControl@dword")->name("super.suratkeluar.word.download");
  Route::get("/super/suratkeluar/dpdf","MainControl@dpdf")->name("super.suratkeluar.pdf.generate");
  Route::get("/super/suratkeluar/detail/{id?}","SuperControl@suratkeluar_show")->name("super.suratkeluar.update");
  Route::post("/super/suratkeluar/detail/{id?}","SuperControl@suratkeluar_update")->name("super.suratkeluar.update");
  Route::get("/super/suratkeluar/delete/{id?}","SuperControl@suratkeluar_delete")->name("super.suratkeluar.delete");
});

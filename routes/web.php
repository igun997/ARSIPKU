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

  Route::get("/super/suratkeluar","SuperControl@suratkeluar_read")->name("super.suratkeluar");
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

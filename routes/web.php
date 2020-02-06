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
  Route::get("/super/api/jenis","SuperControl@api_jenisread")->name("super.api.jenis");
  Route::get("/super/jenis/add","SuperControl@jenis_add")->name("super.jenis.add");
  Route::post("/super/jenis/add","SuperControl@jenis_add_action")->name("super.jenis.add");
  Route::get("/super/jenis/detail/{id?}","SuperControl@jenis_show")->name("super.jenis.update");
  Route::post("/super/jenis/detail/{id?}","SuperControl@jenis_update")->name("super.jenis.update");
  Route::get("/super/jenis/delete/{id?}","SuperControl@jenis_delete")->name("super.jenis.delete");
});

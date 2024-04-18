<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;

Route::get('/habeasData',function (){
    return view('habeasData');
})->name('habeasData');

Route::get('contact',function(){
    return view('contact');
})->name('contact');

Route::resource('user',UserController::class);
Route::resource('city',CityController::class);

Route::get('user/download/excel',[UserController::class,'download'])->name('user.download');
Route::get('user/select/winer',[UserController::class,'winer'])->name('user.winer');
Route::get('user/find/winer',[UserController::class,'findWiner'])->name('user.finWiner');

Route::get('/', function () {
    return view('index');
})->name('index');

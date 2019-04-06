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

Route::get('/', function () {
    return view('map');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', function (\Illuminate\Http\Request $request, \Acme\UseCases\LoadFile $useCase) {
    $useCase($request->file);
});

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transaksi\BghController;
use App\Http\Controllers\Transaksi\HsbgnController;
use App\Http\Controllers\Transaksi\BgUmumController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Transaksi\BgNegaraController;
use App\Http\Controllers\DashboardController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/', [WelcomeController::class, 'index'])->name('/');


Route::group(['prefix'=>'asset','as'=>'asset.'], function(){
    Route::get('deleted', 'App\Http\Controllers\AssetController@deleted')->name('Asset.deleted');
    Route::get('success', 'App\Http\Controllers\AssetController@success')->name('Asset.success');

    Route::group(['prefix'=>'region'], function(){
        Route::get('province', 'App\Http\Controllers\Master\RegionController@province')->name('region.province');
        Route::get('city', 'App\Http\Controllers\Master\RegionController@GetdropDownList')->name('region.list');
        Route::get('city/{id}', 'App\Http\Controllers\Master\RegionController@GetdropDownList');

        // Route::post('regency/fetch', 'App\Http\Controllers\Master\RegionController@fetch')->name('region.fetch');
        // Route::get('regency/{id}', 'App\Http\Controllers\Master\RegionController@regency')->name('region.city');

    });
});

Route::group(['prefix'=>'transaksi','as'=>'transaksi.'], function(){

    Route::group(['prefix'=>'tenaga-ahli-bangunan', 'as' => 'tabg.'], function(){
        Route::get('/', 'App\Http\Controllers\Transaksi\TABGController@index')->name('index');
        Route::get('/view/{id}', 'App\Http\Controllers\Transaksi\TABGController@view')->name('view');
        Route::any('/create', 'App\Http\Controllers\Transaksi\TABGController@create')->name('create');
        Route::any('/store', 'App\Http\Controllers\Transaksi\TABGController@store')->name('store');
        Route::any('/edit/{id}', 'App\Http\Controllers\Transaksi\TABGController@edit')->name('edit');
        Route::any('/update/{id}', 'App\Http\Controllers\Transaksi\TABGController@update')->name('update');
        Route::delete('/{id}', 'App\Http\Controllers\Transaksi\TABGController@delete')->name('delete');
    });
    Route::group(['prefix'=>'regulasi-perda', 'as' => 'regulasi.'], function(){
        Route::resource('/', 'App\Http\Controllers\Transaksi\regulasiPerdaController');
    });
});
            // Route::get('/{programId}', 'Detail\PengelolaTeknisBersertifikasiController@index');
		    // Route::get('/{programId}/{id}/view', 'Detail\PengelolaTeknisBersertifikasiController@view');
		    // Route::any('/{programId}/create', 'Detail\PengelolaTeknisBersertifikasiController@create');
		    // Route::any('/{programId}/{id}/edit', 'Detail\PengelolaTeknisBersertifikasiController@edit');
		    // Route::delete('/{id}/delete', 'Detail\PengelolaTeknisBersertifikasiController@delete');

Route::get('transaksi', 'App\Http\Controllers\HomeController@transaksi')->name('transaksi');

Route::resource('bgh', BghController::class)->middleware('auth');
Route::resource('bg_umum', BgUmumController::class)->middleware('auth');
Route::resource('bg_negara', BgNegaraController::class)->middleware('auth');
Route::resource('hsbgn', HsbgnController::class)->middleware('auth');




require __DIR__ . '/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', 'Auth\PembeliLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\PembeliLoginController@login')->name('login.submit');
Route::get('logout/', 'Auth\PembeliLoginController@logout')->name('pembeli.logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/transaksi', 'TransaksiController');

// Auth::routes();

// Route::match(['get', 'post'], '/register', function () {
//     return redirect('login');
// })->name('register');



// Route::group(['middleware' => ['auth']], function () {

// });

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'HomeAdminController@index')->name('admin.dashboard');
    Route::get('/transaksi/cetak_pdf', 'TransaksiAdminController@cetak_pdf');

    Route::resource('/user', 'UserController')->except(['show']);
    Route::resource('kategori', 'KategoriController')->except('[show]');
    Route::resource('produk', 'ProdukController')->except('[show]');
    Route::resource('pembeli', 'PembeliController')->except('[show]');
    Route::resource('brgmasuk', 'BarangMasukController')->except('[show]');
    Route::resource('transaksiadmin', 'TransaksiAdminController');
});



// Route::group(['middleware' => ['auth:admin']], function () {

//     Route::resource('user', 'UserController')->except(['show']);
//     // Route::resource('supplier', 'SupplierController')->except(['show']);
//     // Route::resource('pegawai', 'PegawaiController')->except('[show]');

//     // Route::post('kategori/test', 'KategoriController@test');
//     // Route::resource('kategori', 'KategoriController')->except('[show]');
//     // Route::resource('produk', 'ProdukController')->except('[show]');
//     // Route::resource('transaksi_masuk', 'TransaksiMasukController')->only(['index', 'create', 'store', 'show', 'destroy']);
//     // Route::get('agen', 'AgenController@index')->name('agen');

//     // Route::get('report_penjualan', 'ReportPenjualanController@index')->name('report_penjualan');
//     // Route::get('cetak_pdf', 'ReportPenjualanController@cetak_pdf')->name('cetak_pdf');
//     // Route::get('cetak_excel', 'ReportPenjualanController@cetak_excel')->name('cetak_excel');
// });

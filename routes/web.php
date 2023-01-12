<?php

use App\Http\Controllers\CashFlowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MateraiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TradingStyleController;
use App\Models\Trade;
use App\Models\TradingStyle;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;

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
    return view('landingPage');
});

// Auth::routes();
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::controller(HomeController::class)->group(function () {
//     Route::get('/default', 'index');
// });

Route::controller(TradingStyleController::class)->group(function () {
    Route::get('home', 'index')->name('tradingStyleIndex');
    Route::get('profile', 'profile')->name('tradingStyleProfile');
    Route::post('store', 'store')->name('tradingStyleStore');
    Route::get('style', 'create')->name('tradingStyleDb');
    // Route::get('style/{users}', 'edit')->name('tradingStyleEdit');
    // Route::put('style/{users}', 'update')->name('tradingStyleUpdate');
});

Route::get('autoInput1807', function () {
    TradingStyle::create([
        'user_id' => Auth::id(),
        'modal' => 0,
        'fee_broker_beli' => 0.15,
        'fee_broker_jual' => 0.25
    ]);
    return redirect('home');
});

Route::get('tradeInput', function () {
    Trade::create([
        'user_id' => Auth::id(),
        'trade_id' => Auth::id(),
        'kode_saham' => 'SBT',
        'lot' => 1,
        'harga_beli' => 100000,
        'tanggal_beli' => '2018-07-01',
        'nominal_beli' => 100000,
        'net_beli' => 2000,
        'status' => 'running',
    ]);
});

Route::controller(TradeController::class)->group(function () {
    Route::get('/trade', 'create')->name('tradeCreate');
    Route::post('/trade/store', 'store')->name('tradeStore');
    Route::get('/trade/aktif', 'index')->name('tradeIndex');
    Route::get('/trade/selesai', 'selesai')->name('tradeSelesai');
    Route::get('trade/jual/{data}', 'show')->name('tradeShow');
    Route::put('trade/jual/{data}', 'jual')->name('tradeJual');
    Route::get('trade/delete/{data}', 'destroy')->name('tradeDel');
    // Route::get('debug', 'debug')->name('tradeDebug');
});

// Laporan
Route::get('laporan', [LaporanController::class, 'index'])->name('laporanShow');

// Materai
// Route::get('materai', [MateraiController::class, 'index'])->name('laporanIndex');

Route::controller(CashFlowController::class)->group(function () {
    Route::get('deposit', 'deposit')->name('cf_deposit');
    Route::post('deposit', 'store')->name('cf_deposit_post');
    Route::get('withdrawal', 'withdrawal')->name('cf_withdrawal');
    Route::post('withdrawal', 'wd')->name('cf_withdrawal_post');
});

Route::controller(SettingController::class)->group(function () {
    Route::get('settings', 'index')->name('show_setting');
    Route::get('settings/edit', 'edit')->name('setting_edit');
    Route::put('settings/update', 'update')->name('setting_update');
});

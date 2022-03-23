<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\RefferalController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CouponController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

/*
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
}); */

Route::middleware('auth')->group(function () {
    Route::get('sales_static', [MainController::class, 'sales_static']);
    Route::get('dashboard', [ MainController::class, 'dashboard'])->name('dashboard');
    Route::resource('player', PlayerController::class);
    Route::resource('guild', GuildController::class);
    Route::resource('account', AccountController::class);
    Route::resource('support', SupportController::class);
    Route::get('account/{id}/action', [AccountController::class, 'action'])->name('account.action');
    Route::post('account/{id}/transactions', [AccountController::class, 'transactions'])->name('account.transactions');
    Route::post('support/{id}/add_answer', [SupportController::class, 'add_answer'])->name('support.add_answer');
    Route::get('support/{id}/close', [SupportController::class, 'close'])->name('support.close');
    Route::get('sendcash/updatecash', [ShopController::class, 'updateCash'])->name('shop.updatecash');
    Route::get('sendcash', [ShopController::class, 'SendCash'])->name('shop.sendcash');
    Route::resource('shop', ShopController::class);
    Route::get('channel/truncate', [ChannelController::class, 'truncate'])->name('channel.truncate');
    Route::resource('channel', ChannelController::class);
    Route::get('refferal', [RefferalController::class, 'index'])->name('refferal.index');
    Route::get('command', [CommandController::class, 'index'])->name('command.index');
    Route::resource('coupon', CouponController::class);
});

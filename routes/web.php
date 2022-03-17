<?php

use Illuminate\Support\Facades\Route;

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
    return 'ok';
});

Route::get('callee/{shopId}', function ($shopId) {
    return view('callee', ['shopId' => $shopId]);
});

Route::get('caller/{shopId}/{tableId}', function ($shopId, $tableId) {
    return view('caller', [
        'shopId'  => $shopId,
        'tableId' => $tableId,
    ]);
});

Route::post('caller/{shopId}/{tableId}/calls', function ($shopId, $tableId) {
    broadcast(new \App\Events\TableCall($shopId, $tableId));

    return redirect("/caller/$shopId/$tableId");
});

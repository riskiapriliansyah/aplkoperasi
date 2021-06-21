<?php

use App\Http\Controllers\PendaftarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('districtKTP', [PendaftarController::class, 'getDistrictKTP']);
Route::get('villageKTP', [PendaftarController::class, 'getVillageKTP']);
Route::get('districtDomisili', [PendaftarController::class, 'getDistrictDomisili']);
Route::get('villageDomisili', [PendaftarController::class, 'getVillageDomisili']);
Route::get('city', [PendaftarController::class, 'getCity']);
Route::get('district', [PendaftarController::class, 'getDistrict']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

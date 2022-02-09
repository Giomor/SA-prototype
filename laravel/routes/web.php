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
    return view('welcome');
});

Route::get('/recommendation','\App\Http\Controllers\RecommendationController@recommendMuseums');
//AUTH ROUTES
Route::get('login', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');
Route::post('post-login', [\App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [\App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post');
Route::get('heritage-sites', [\App\Http\Controllers\Auth\AuthController::class, 'heritage-sites']);
Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');;

Route::get('/generate-qrcode', [\App\Http\Controllers\TicketController::class, 'bookTicket']);
Route::get('/available-tickets/{heritageSite_id}', [\App\Http\Controllers\TicketController::class, 'getAllAvailableHeritageTickets']);
Route::get('/recommended-museums/{heritageSite_id}', [\App\Http\Controllers\RecommendationController::class, 'recommendMuseums']);
Route::get('/heritage-sites', [\App\Http\Controllers\HeritageSiteController::class, 'getAllHeritageSites']);

/*
Aggregator of IoT signals
*/
Route::get('/aggregator',  function () {
    return view('welcome');
});

Route::post('/aggregator', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'aggregator']);//Called by device at the mqtt subscribe message (parsing of json data to gather info regarding the hs)
Route::get('/testArtworkProximity', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'TFlister']);//Page used to test provided feature
Route::get('/testArtworkProximity/{hsid}', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'testingFeature']);//Page used to test provided feature



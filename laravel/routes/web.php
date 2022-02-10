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

//FRONTEND
Route::get('/generate-qrcode', [\App\Http\Controllers\TicketController::class, 'bookTicket']);
Route::get('/available-tickets/{heritageSite_id}', [\App\Http\Controllers\TicketController::class, 'getAllAvailableHeritageTickets']);
Route::get('/artworks/{heritageSite_id}', [\App\Http\Controllers\ArtworkController::class, 'getAllFrontendArtworks']);
Route::post('/add-favorite', [\App\Http\Controllers\FavoriteController::class, 'storeFavorite'])->name('addFavorite');
Route::get('/recommended-museums/{heritageSite_id}', [\App\Http\Controllers\RecommendationController::class, 'recommendMuseums']);
Route::get('/heritage-sites', [\App\Http\Controllers\HeritageSiteController::class, 'getAllHeritageSites']);

//BACKEND
Route::get('/backend/iot', [\App\Http\Controllers\IoTController::class, 'getAllIoT']);
Route::get('/backend/add-iot/{heritageSiteId}', [\App\Http\Controllers\IoTController::class, 'addIoT']);
Route::post('/backend/store-iot', [\App\Http\Controllers\IoTController::class, 'storeIoT'])->name('iot.post');
Route::get('/backend/edit-iot/{iotId}', [\App\Http\Controllers\IoTController::class, 'editIoT']);
Route::post('/backend/update-iot', [\App\Http\Controllers\IoTController::class, 'updateIoT'])->name('editIot.post');
Route::post('/delete-iot', [\App\Http\Controllers\IoTController::class, 'deleteIoT'])->name('deleteIot');
Route::get('/backend/artworks', [\App\Http\Controllers\ArtworkController::class, 'getAllArtworks']);
Route::get('/backend/add-artwork/{heritageSiteId}', [\App\Http\Controllers\ArtworkController::class, 'addArtwork']);
Route::post('/backend/store-artwork', [\App\Http\Controllers\ArtworkController::class, 'storeArtwork'])->name('artwork.post');
Route::get('/backend/edit-artwork/{artworkId}', [\App\Http\Controllers\ArtworkController::class, 'editArtwork']);
Route::post('/backend/update-artwork', [\App\Http\Controllers\ArtworkController::class, 'updateArtwork'])->name('editArtwork.post');
Route::post('/delete-artwork', [\App\Http\Controllers\ArtworkController::class, 'deleteArtwork'])->name('deleteArtwork');
/*
Aggregator of IoT signals
*/
Route::get('/aggregator',  function () {
    return view('welcome');
});

Route::post('/aggregator', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'aggregator']);//Called by device at the mqtt subscribe message (parsing of json data to gather info regarding the hs)
Route::get('/testArtworkProximity', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'TFlister']);//Page used to test provided feature
Route::get('/testArtworkProximity/{hsid}', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'testingFeature']);//Page used to test provided feature



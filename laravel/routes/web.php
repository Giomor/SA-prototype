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
Route::get('/generate-qrcode/{ticket_id}', [\App\Http\Controllers\TicketController::class, 'bookTicket']);
Route::get('/available-tickets/{heritageSite_id}', [\App\Http\Controllers\TicketController::class, 'getAllAvailableHeritageTickets']);
Route::get('/artworks/{heritageSite_id}', [\App\Http\Controllers\ArtworkController::class, 'getAllFrontendArtworks']);
Route::post('/add-favorite', [\App\Http\Controllers\FavoriteController::class, 'storeFavorite'])->name('addFavorite');
Route::post('/delete-favorite', [\App\Http\Controllers\FavoriteController::class, 'deleteFavorite'])->name('removeFavorite');
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
Route::get('/backend/crowdcheck/{hsid}', [\App\Http\Controllers\ArtworkController::class, 'crowdCheck'])->name('editArtwork.post');

Route::get('/backend/crowd-size', [\App\Http\Controllers\BookingController::class, 'crowdSize']);

Route::get('/backend/add-ticket/{heritageSiteId}', [\App\Http\Controllers\BookingController::class, 'addTicket']);
Route::post('/backend/book-ticket', [\App\Http\Controllers\BookingController::class, 'storeBook'])->name('ticket.post');

Route::get('/backend/analytics', [\App\Http\Controllers\AnalyticController::class, 'getAnalytics']);


Route::get('/suggest-routes', [\App\Http\Controllers\RecommendationController::class, 'suggestRoute']);

/*
Aggregator of IoT signals
*/
Route::get('/iot/aggregator',  function () {
    return view('welcome');
});

Route::post('/iot/aggregator', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'deviceAggregation']);//Called by device at the mqtt subscribe message (parsing of json data to gather info regarding the hs)
Route::get('/iot/testArtworkProximity', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'TFlister']);//Page used to test provided feature
Route::get('/iot/testArtworkProximity/{hsid}', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'testingFeature']);//Page used to test provided feature
Route::post('/iot/endcheck', [\App\Http\Controllers\ArtworkDescriptionServing::class, 'endCheck']);//Page used to test provided feature


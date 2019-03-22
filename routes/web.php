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

Route::group(['middleware' => 'web'], function() {
  Route::get('/', function () {
      return view('auth.login');
  });
});


Route::get('/date', function () {
    return view('date');
});


Route::get('/statistiques', 'ParoisseController@stats');

Route::get('/get-intention-chart-data', 'ChartDataController@getMonthlyIntentionData');
Route::get('/get-clocher-chart-data', 'ChartDataController@getMonthlyClocherData');

Route::get('/test', 'ChartDataController@getAllClochers');


Route::get('/profil-celebrant', 'ProfilController@index');
Route::post('/profil-celebrant', 'ProfilController@export');


Auth::routes();

Route::group(['middleware' => ['auth', 'roles:Admin']], function(){

  Route::get('/accueil', function () { return view('accueil.accueil'); });
  Route::get('/accueil/ajouter-intention', function () { return view('accueil.addintention'); });
  Route::post('/accueil/ajouter-intention', 'IntentionController@create');

  Route::group(['prefix' => 'recherche'], function(){
    Route::get('/', function() { return view('accueil.recherche'); });
    Route::post('/resultat', 'RechercheController@filter');
    Route::match(['GET', 'PUT'], '/resultat/update/{id}', 'IntentionController@update');

  });

Route::get('/exporter', function () { return view('accueil.export'); });
// Route::post('/exporter/resultat', 'ExportController@export');
Route::post('/exporter/resultat/export', 'IntentionController@export');


  Route::group(['prefix' => 'intentions'], function() {
    Route::get('/', 'IntentionController@index');
    Route::match(['get', 'post'], '/create', 'IntentionController@create');
    Route::match(['get', 'put'], '/update/{id}', 'IntentionController@update');
    // Route::post('{id_paroisse}/search', 'FilterController@filter');
});

  Route::group(['prefix' => 'utilisateurs'], function() {
    Route::get('/', 'UtilisateurController@index');
    Route::match(['get', 'post'], 'create', 'UtilisateurController@create');
    Route::match(['get', 'put'], '/update/{id}', 'UtilisateurController@update');
    Route::delete('delete/{id}', 'UtilisateurController@destroy');
});

Route::get('utilisateurs/', [
    'uses' => 'UtilisateurController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);


Route::group(['prefix' => 'celebrants'], function() {
  Route::get('/', 'CelebrantController@index');
  Route::match(['get', 'post'], '/create', 'CelebrantController@create');
  Route::match(['get', 'put'], '/update/{id}', 'CelebrantController@update');
  Route::delete('delete/{id}', 'CelebrantController@destroy');
});

Route::group(['prefix' => 'clochers'], function() {
  Route::get('/', 'ClocherController@index');
  Route::match(['get', 'post'], 'create', 'ClocherController@create');
  Route::match(['get', 'put'], '/update/{id}', 'ClocherController@update');
  Route::delete('delete/{id}', 'ClocherController@destroy');
});

Route::group(['prefix' => 'paroisses'], function() {
  Route::get('/', 'ParoisseController@index');
  Route::match(['get', 'post'], 'create', 'ParoisseController@create');
  Route::match(['get', 'put'], 'update/{id}', 'ParoisseController@update');
  Route::delete('delete/{id}', 'ParoisseController@destroy');
});

Route::group(['prefix' => 'regler'], function() {
  Route::get('/', 'ReglerController@index');
  Route::get('update/{id}', 'ReglerController@regler');
  Route::post('update/{id}', 'ReglerController@update');
});

Route::group(['prefix' => 'transfert'], function() {
  Route::get('/', 'TransfertController@index');
  Route::get('update/{id}', 'TransfertController@transfert');
  Route::post('update/{id}', 'TransfertController@update');
});




});

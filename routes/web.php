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

Route::group(['middleware' => 'web'], function() {
  Route::get('/register', function () {
      return view('auth.register');
  });
});


Route::get('/date', function () {
    return view('date');
});


Route::get('/get-intention-chart-data', 'ChartDataController@getMonthlyIntentionData');
Route::get('/get-intention-past-chart-data', 'ChartDataController@getPastYearIntentionData');
Route::get('/get-clocher-chart-data', 'ChartDataController@getMonthlyClocherData');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

Route::get('/statistiques', 'ParoisseController@stats');



Route::get('/profil-celebrant', [
  'uses' => 'ProfilController@index',
  'middleware' => 'roles',
  'roles' => ['Admin', 'Celebrant']
  ]);


Route::group(['prefix' => 'profil-celebrant'], function() {
  // Route::get('/', 'ProfilController@index');
  Route::post('/', 'ProfilController@celebrer');
});


Route::get('celebrants/', [
    'uses' => 'CelebrantController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);

Route::get('/comptable', [
  'uses' => 'ComptableController@index',
  'middleware' => 'roles',
  'roles' => ['Admin', 'Comptable']
  ]);

Route::post('/comptable/exporter', 'ComptableController@export');


  Route::get('comptable/payer', 'ReglerComptableController@index');
  Route::get('comptable/payer/{id}', 'ReglerComptableController@regler');
  Route::post('comptable/payer/{id}', 'ReglerComptableController@update');





  Route::get('/accueil', function () { return view('accueil.accueil'); });

  Route::match(['GET', 'POST'], '/ajouter-intention', 'IntentionController@create');

Route::get('/exporter', function () { return view('accueil.export'); });
// Route::post('/exporter/resultat', 'ExportController@export');
Route::post('/exporter/export', 'IntentionController@export');


  Route::group(['prefix' => '/intentions'], function() {
    // Route::get('/', 'IntentionController@index');
    Route::match(['get', 'post'], '/create', 'IntentionController@create');
    Route::match(['get', 'put'], '/update/{id}', 'IntentionController@update');
    // Route::post('{id_paroisse}/search', 'FilterController@filter');
});

  Route::group(['prefix' => 'utilisateurs'], function() {
    // Route::get('/', 'UtilisateurController@index');
    Route::match(['get', 'post'], 'create', 'UtilisateurController@create');
    Route::match(['get', 'put'], '/update/{id}', 'UtilisateurController@update');
    Route::delete('delete/{id}', 'UtilisateurController@destroy');
});

Route::get('intentions/', [
    'uses' => 'IntentionController@index',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Utilisateur']

]);

Route::get('utilisateurs/', [
    'uses' => 'UtilisateurController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);

Route::get('celebrants/', [
    'uses' => 'CelebrantController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);

Route::get('clochers/', [
    'uses' => 'ClocherController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);

Route::get('paroisses/', [
    'uses' => 'ParoisseController@index',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);



Route::group(['prefix' => 'celebrants'], function() {

  Route::match(['get', 'post'], '/create', 'CelebrantController@create');
  Route::match(['get', 'put'], '/update/{id}', 'CelebrantController@update');
  Route::delete('delete/{id}', 'CelebrantController@destroy');
});

Route::group(['prefix' => 'clochers'], function() {

  Route::match(['get', 'post'], 'create', 'ClocherController@create');
  Route::match(['get', 'put'], '/update/{id}', 'ClocherController@update');
  Route::delete('delete/{id}', 'ClocherController@destroy');
});

Route::group(['prefix' => 'paroisses'], function() {

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

Route::group(['middleware' => 'roles'], function() {

});
});

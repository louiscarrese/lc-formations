<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/** 
 * API (will return JSON data) 
 */

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {

    //Listes fermées
    Route::resource('stagiaire_type', 'StagiaireTypeController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('domaine_formation', 'DomaineFormationController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('tarif_type', 'TarifTypeController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('lieu', 'LieuController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('formateur_type', 'FormateurTypeController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('financeur_type', 'FinanceurTypeController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);


    Route::resource('module', 'ModuleController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('module.session', 'SessionController',
        ['only' => ['store', 'show', 'update', 'destroy']]);
});


Route::get('/', function () {
//    return view('welcome');
      return "Yay !";
});

//"Pages"
Route::get('/parametres', 'ParametresController@index');
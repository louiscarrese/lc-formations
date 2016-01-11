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
    Route::resource('tarif', 'TarifController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('session', 'SessionController',
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('session_jour', 'SessionJourController',
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('formateur', 'FormateurController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('financeur', 'FinanceurController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('employeur', 'EmployeurController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('stagiaire', 'StagiaireController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('inscription', 'InscriptionController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('financeur_inscription', 'FinanceurInscriptionController', 
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});


Route::get('/', function () {
    return view('home');
});

//"Pages"
Route::get('/parametres', 'ParametresController@index');
Route::resource('/modules', 'ModulesController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/sessions', 'SessionsController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/formateurs', 'FormateursController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/financeurs', 'FinanceursController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/employeurs', 'EmployeursController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/stagiaires', 'StagiairesController', 
    ['only' => ['index', 'create', 'show']]);
Route::resource('/inscriptions', 'InscriptionsController', 
    ['only' => ['index', 'create', 'show']]);

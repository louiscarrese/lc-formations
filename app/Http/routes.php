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
Route::group(['middleware' => 'auth.basic.name'], function() {
    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
        Route::post('session_jour/create_default', 'SessionJourController@createDefault');

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
        Route::resource('niveau_formation', 'NiveauFormationController', 
            ['only' => ['index', 'store', 'show', 'update', 'destroy']]);


        Route::resource('module', 'ModuleController', 
            ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
        Route::resource('tarif', 'TarifController', 
            ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

        Route::resource('session', 'SessionController',
            ['only' => ['store', 'show', 'update', 'destroy']]);
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

    /**
     * Printable editions
     */
    Route::group(['prefix' => 'print'], function() {
        Route::get('emargement/{session_id}', 'PrintController@emargement');
        Route::get('suivi_session/{session_id}', 'PrintController@suiviSession');
    });

    Route::get('/', 'IndexController@index');

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

    Route::get('/search', 'SearchController@index');
});

/*
 * Preinscriptions
 */
//Views
Route::resource('/preinscription', 'PreinscriptionsController', 
    ['only' => ['index']]);
Route::get('/preinscription/conditions', 'PreinscriptionsController@conditions');
//API
Route::resource('/api/preinscription', 'Api\PreinscriptionController', 
    ['only' => ['store']]);
Route::resource('api/session', 'Api\SessionController',
    ['only' => ['index']]);

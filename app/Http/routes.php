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
Route::group(['prefix' => 'intra'], function() {
    Route::group(['middleware' => 'auth.basic.name'], function() { // possible to merge this with the first group ?
        Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
            Route::post('session_jour/create_default', 'SessionJourController@createDefault');
            Route::get('session/mail_formateurs', 'SessionController@generateFormateursMail');
            Route::get('session/upcoming', 'SessionController@upcoming');
            Route::get('inscription/en_cours', 'InscriptionController@enCours');

            //Recherches
            Route::get('employeur/search', 'EmployeurController@search');
            Route::get('financeur/search', 'FinanceurController@search');
            Route::get('formateur/search', 'FormateurController@search');
            Route::get('inscription/search', 'InscriptionController@search');
            Route::get('module/search', 'ModuleController@search');
            Route::get('session/search', 'SessionController@search');
            Route::get('stagiaire/search', 'StagiaireController@search');

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
                ['only' => ['index', 'show']]);
            Route::resource('niveau_formation', 'NiveauFormationController', 
                ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
            Route::resource('parametre', 'ParametreController', 
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

            Route::resource('preinscription', 'PreinscriptionController', 
                ['only' => ['index', 'show', 'update', 'destroy']]);

        });

        /**
         * Printable editions
         */
        Route::group(['prefix' => 'print'], function() {
            Route::get('emargement/{session_id}', 'PrintController@emargement');
            Route::get('suivi_session/{session_id}', 'PrintController@suiviSession');
            Route::get('attestation/{session_id}', 'PrintController@attestation');
            Route::get('parameterAttestation/{session_id}', 'PrintController@parameterAttestation');
            Route::get('dataExtraction', 'PrintController@dataExtraction');
            Route::get('contrat/{inscription_id}', 'PrintController@contrat');
            Route::get('parameterContrat/{inscription_id}', 'PrintController@parameterContrat');
            Route::get('convention/{inscription_id}', 'PrintController@convention');
            Route::get('parameterConvention/{inscription_id}', 'PrintController@parameterConvention');
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
        Route::get('/preinscriptions/associate_stagiaire', 'PreinscriptionsController@associateStagiaire');
        Route::resource('/preinscriptions', 'PreinscriptionsController', 
            ['only' => ['index', 'show']]);

        Route::get('/search', 'SearchController@index');

    });
});
/*
 * Preinscriptions
 */
//Views
Route::get('/preinscription', 'PreinscriptionsController@publicForm');
Route::get('/preinscription/conditions', 'PreinscriptionsController@conditions');
Route::get('/preinscription/thanks', 'PreinscriptionsController@thanks');
//API
Route::resource('/intra/api/preinscription', 'Api\PreinscriptionController', 
    ['only' => ['store']]);
Route::resource('/intra/api/session', 'Api\SessionController',
    ['only' => ['index']]);

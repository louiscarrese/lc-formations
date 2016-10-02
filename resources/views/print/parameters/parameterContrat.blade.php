@inject('viewService', 'ModuleFormation\Services\ViewService')

<h2>Paramètres du contrat</h2>
<form method="GET" action="{{$viewService->privateUrl('print/contrat/' . $inscription_id)}}" class="container" target="_blank">
    <p class="row">
        <label class="col-sm-3" for="nom_prenom_stagiaire">Prénom et nom du stagiaire : </label>
        <input class="col-sm-5" type="text" name="nom_prenom_stagiaire" value="{{$nom_prenom_stagiaire}}" />
    </p>
    <p class="row">
        <label class="col-sm-3" for="adresse_stagiaire">Adresse du stagiaire : </label>
        <input class="col-sm-5" type="text" name="adresse_stagiaire" value="{{$adresse_stagiaire}}" />
    </p>
    <p class="row">
        <label class="col-sm-3" for="libelle_module">Intitulé de la formation : </label>
        <input class="col-sm-5" type="text" name="libelle_module" value="{{$libelle_module}}" />
    </p>
    <p class="row">
        <label class="col-sm-3" for="dates">Dates de la formation : </label>
        <input class="col-sm-3" type="text" name="dates" value="{{$dates}}" />
    </p>
    <p class="row">
        <label class="col-sm-3" for="montant">Montant à payer : </label>
        <input class="col-sm-1" type="text" name="montant" value="{{$montant}}" />
    </p>
    <div class="buttons row">
        <button type="submit" class="btn btn-default">Générer le PDF</button>
        <button type="button" class="btn" ng-click="printParameterCtrl.close()">Fermer</button>
    </div>
</form>

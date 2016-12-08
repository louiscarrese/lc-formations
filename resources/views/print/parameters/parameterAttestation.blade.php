@inject('viewService', 'ModuleFormation\Services\ViewService')

<h2>Paramètres de l'attestation</h2>
<form method="GET" action="{{$viewService->privateUrl('print/attestation/' . $session_id)}}" class="container" target="_blank">
    <p class="row">
        <label class="col-sm-3" for="lieu_formation">Lieu de la formation : </label>
        <input class="col-sm-5" type="text" name="lieuFormation" value="{{$lieuFormation}}" />
    </p>

    <div class="buttons row">
        <button type="submit" class="btn btn-default">Générer le PDF</button>
        <button type="button" class="btn" ng-click="printParameterCtrl.close()">Fermer</button>
    </div>
</form>

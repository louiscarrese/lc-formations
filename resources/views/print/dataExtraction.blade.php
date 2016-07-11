@inject('direccteService', 'ModuleFormation\Services\DireccteService')
<?php
    $min_date = Carbon\Carbon::now()->subYear()->startOfYear();
    $max_date = Carbon\Carbon::now()->subYear()->endOfYear();

    $G_D = $direccteService->G_D($min_date, $max_date);
    $BF = $direccteService->BF($min_date, $max_date);
    $BP = $direccteService->BP($min_date, $max_date);
?>


<h2>Extractions DIRECCTE pour la période du {{$min_date->format('d/m/Y')}} - {{$max_date->format('d/m/Y')}}</h2>

<h4>D. Personnes dispensant des heures de formation</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Type</th>
            <th>Nombre de formateurs</th>
            <th>Nombre d'heures dispensées</th>
        </tr>
    </thead>
    <tbody>
@foreach($G_D['data'] as $type => $line)
        <tr>
            <td>{{$type}}</td>
            <td>{{$line['nombre']}}</td>
            <td>{{$line['somme']}}</td>
        </tr>
@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>Total</td>
            <td>{{$G_D['total']['nombre']}}</td>
            <td>{{$G_D['total']['somme']}}</td>
        </tr>
    </tfoot>
</table>

<h3>Bilan financier hors taxes</h3>
<h4>A. Origine des produits de l'organisme</h4>

<h5>A1. Produit provenant des entreprises</h5>
<div>
    <p>
    a. Pour la formation de leurs salariés : {{$BF['A_A1_a'] or '-1'}}
    </p>
    <p>
    a'. Dont les salariés sous contrat de professionalisation : {{$BF['A_A1_a_prime'] or '-1'}}
    </p>
</div>

<h5>A2. Produits provenant des organismes collecteurs des fonds de la formation professionnelle</h5>
<div>
    a. Organismes collecteurs paritaires agréés : au titre du plan de formation : {{$BF['A_A2_a'] or '-1'}}
</div>

<h5>A3. Produits provenant des pouvoirs publics</h5>
<div>
    a. Pour la formation de leurs agents : {{$BF['A_A3_a'] or '-1'}}
</div>

<h5>A4. Produits provenant de contrats conclus avec des particuliers</h5>
<div>
    a. Pour la formation à titre individuel et à leurs frais : {{$BF['A_A4'] or '-1'}}
</div>

<h3>Bilan pédagogique</h3>
<h4>A. Type de stagiaires de l'organisme</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nombre de stagiaires</th>
            <th>Nombre d'heures-stagiaires</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Salariés bénéficiant d'un financement par l'employeur</td>
            <td>{{$BP['A_1']['nb_stagiaires']}}</td>
            <td>{{$BP['A_1']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;Dont salariés sous contrat de professionalisation</td>
            <td>{{$BP['A_1_prime']['nb_stagiaires']}}</td>
            <td>{{$BP['A_1_prime']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Demandeurs d'emploi bénéficiant d'un financement public</td>
            <td>{{$BP['A_2']['nb_stagiaires']}}</td>
            <td>{{$BP['A_2']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Particuliers à leurs propres frais</td>
            <td>{{$BP['A_3']['nb_stagiaires']}}</td>
            <td>{{$BP['A_3']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Autres stagiaires</td>
            <td>{{$BP['A_4']['nb_stagiaires']}}</td>
            <td>{{$BP['A_4']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{{$BP['A_total']['nb_stagiaires']}}</td>
            <td>{{$BP['A_total']['nb_heures']}}</td>
        </tr>
    </tbody>
</table>

<h4>B. Activité en propre de l'organisme et activité sous traitée</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nombre de stagiaires</th>
            <th>Nombre d'heures-stagiaires</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Formés par votre organisme pour son propre compte</td>
            <td>{{$BP['B_1']['nb_stagiaires']}}</td>
            <td>{{$BP['B_1']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Formés par votre organisme pour le compte d'un autre organisme</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Total (1 + 2)</td>
            <td>{{$BP['B_1']['nb_stagiaires']}}</td>
            <td>{{$BP['B_1']['nb_heures']}}</td>
        </tr>
        <tr>
            <td>Formations confiées par votre organisme à un autre organisme de formation</td>
            <td>{{$BP['B_3']['nb_stagiaires']}}</td>
            <td>{{$BP['B_3']['nb_heures']}}</td>
        </tr>
    </tbody>
</table>

<h4>C. Objectif général des formations dispensées</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nombre de stagiaires</th>
            <th>Nombre d'heures-stagiaires</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Autres formations professionnelles continues (initiation, perfectionnement, ...)</td>
            <td>{{$BP['A_total']['nb_stagiaires']}}</td>
            <td>{{$BP['A_total']['nb_heures']}}</td>
        </tr>
    </tbody>
</table>

<h4>D. Spécialités de formation</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Nombre de stagiaires</th>
            <th>Nombre d'heures-stagiaires</th>
        </tr>
    </thead>
    <tbody>

        @foreach($BP['D'] as $code_formation => $data)
            <tr>
                <td>{{$code_formation}}</td>
                <td>{{$data['nb_stagiaires']}}</td>
                <td>{{$data['nb_heures']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@inject('direccteService', 'ModuleFormation\Services\DireccteService')
<?php
    $min_date = Carbon\Carbon::now()->subYear()->startOfYear();
    $max_date = Carbon\Carbon::now()->subYear()->endOfYear();

    $G_D = $direccteService->G_D($min_date, $max_date);
    $BF_A = $direccteService->BF_A($min_date, $max_date);
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
    a. Pour la formation de leurs salariés : {{$BF_A['A1_a']}}
    </p>
    <p>
    a'. Dont les salariés sous contrat de professionalisation : {{$BF_A['A1_a_prime']}}
    </p>
</div>

<h5>A2. Produits provenant des organismes collecteurs des fonds de la formation professionnelle</h5>
<div>
    a. Organismes collecteurs paritaires agréés : au titre du plan de formation : {{$BF_A['A2_a']}}
</div>

<h5>A3. Produits provenant des pouvoirs publics</h5>
<div>
    a. Pour la formation de leurs agents : {{$BF_A['A3_a']}}
</div>

<h5>A4. Produits provenant de contrats conclus avec des particuliers</h5>
<div>
    a. Pour la formation à titre individuel et à leurs frais : {{$BF_A['A4']}}
</div>

<h5> 
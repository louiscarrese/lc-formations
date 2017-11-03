<?php
//    $min_date = Carbon\Carbon::now()->subYear()->startOfYear();
//    $max_date = Carbon\Carbon::now()->subYear()->endOfYear();
?>


<h2>Extractions pour la période du {{$min_date->format('d/m/Y')}} - {{$max_date->format('d/m/Y')}}</h2>
<div>
    Bientôt ici : sélection des dates d'extraction.
</div>
<h2>Statistiques</h2>
<h4>Par domaine de formation</h4>
<table class="table table-stripped">
    <thead>
	<tr>
	    <th>Domaine</th>
	    <th>Nombre de modules</th>
	    <th>Nombre de sessions</th>
	    <th>Nombre d'inscriptions</th>
	    <th>Nombre de formateurs</th>
	    <th>Nombre d'heures de session</th>
	    <th>Nombre d'heures "stagiaire"</th>
	</tr>
    </thead>
    <tbody>
	@foreach($byDomaine as $domaine => $data)
	    <tr>
		<td>{{$domaine}}</td>
		<td>{{$data['nb_modules']}}</td>
		<td>{{$data['nb_sessions']}}</td>
		<td>{{$data['nb_inscriptions']}}</td>
		<td>{{$data['nb_formateurs']}}</td>
		<td>{{$data['nb_heures_sessions']}}</td>
		<td>{{$data['nb_heures_stagiaires']}}</td>
	    </tr>
	@endforeach
    </tbody>
</table>

<h4>Par module</h4>
<table class="table table-stripped">
    <thead>
	<tr>
	    <th>Module</th>
	    <th>Nombre de sessions</th>
	    <th>Nombre d'inscriptions</th>
	    <th>Nombre de formateurs</th>
	    <th>Nombre d'heures de session</th>
	    <th>Nombre d'heures "stagiaire"</th>
	</tr>
    </thead>
    <tbody>
	@foreach($byModule as $module => $data)
	    <tr>
		<td>{{$module}}</td>
		<td>{{$data['nb_sessions']}}</td>
		<td>{{$data['nb_inscriptions']}}</td>
		<td>{{$data['nb_formateurs']}}</td>
		<td>{{$data['nb_heures_sessions']}}</td>
		<td>{{$data['nb_heures_stagiaires']}}</td>
	    </tr>
	@endforeach
    </tbody>
</table>


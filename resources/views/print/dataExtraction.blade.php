<?php
//    $min_date = Carbon\Carbon::now()->subYear()->startOfYear();
//    $max_date = Carbon\Carbon::now()->subYear()->endOfYear();
?>
<h2>Extractions pour la période du {{$min_date->format('d/m/Y')}} - {{$max_date->format('d/m/Y')}}</h2>
<div>
    <form class="form-inline" method="GET">
	<div class="form-group">
	    <label for="datepicker-start">A partir de : </label>
	    <input type="date" id="datepicker-start" name="min_date" value="{{$min_date->format('Y-m-d')}}">
	    <label for="datepicker-end">Jusqu'à : </label>
	    <input type="date" id="datepicker-end" name="max_date" value="{{$max_date->format('Y-m-d')}}">
	    <input type="submit">
	</div>
    </form>
</div>
<h2>Extractions CSV</h2>
<div>
    <a href="{{$viewService->privateURL('print/csv/inscriptions?min_date='.$min_date->format('Y-m-d').'&max_date='.$max_date->format('Y-m-d'))}}" class="btn btn-default" target="_blank">Par inscription</a>
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
		<td>{{$data['nb_modules'] or "N/A"}}</td>
		<td>{{$data['nb_sessions'] or "N/A"}}</td>
		<td>{{$data['nb_inscriptions'] or "N/A"}}</td>
		<td>{{$data['nb_formateurs'] or "N/A"}}</td>
		<td>{{$data['nb_heures_sessions'] or "N/A"}}</td>
		<td>{{$data['nb_heures_stagiaires'] or "N/A"}}</td>
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
		<td><a href="../modules/{{$data['module_id']}}">{{$module}}</a></td>
		<td>{{$data['nb_sessions'] or "N/A"}}</td>
		<td>{{$data['nb_inscriptions'] or "N/A"}}</td>
		<td>{{$data['nb_formateurs'] or "N/A"}}</td>
		<td>{{$data['nb_heures_sessions'] or "N/A"}}</td>
		<td>{{$data['nb_heures_stagiaires'] or "N/A"}}</td>
	    </tr>
	@endforeach
    </tbody>
</table>


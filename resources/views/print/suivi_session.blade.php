@extends('layouts.print')

@section('css-file', 'css/suivi-session.css')

@section('content')
    <table class="header-table">
        <tr>
            <td rowspan="2" class="small-col fillable centered">Nbre copie feuille de présence</td>
            <td colspan="3" class="centered vertical-centered">{{$session->module->libelle}}</td>
        </tr>
        <tr>
            <td>
                <p class="header-title">DATES SESSION : </p>
                <ul class="header-value">
                    @foreach($session->session_jours as $session_jour)
                        <li>{{\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session_jour->date)->format('d/m/Y')}}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <p class="header-title">DUREE</p>
                <p class="header-value">{{floor($nb_minutes / 60)}}h{{(($nb_minutes % 60))}} ({{count($session->session_jours)}} jours)</p>
            </td>
            <td>
                <p class="header-title">FORMATEURS</p>
                <p class="header-value">
                    <ul>
                        @foreach($formateurs as $formateur)
                            <li>{{$formateur->prenom}} {{$formateur->nom}}</li>
                        @endforeach
                    </ul>
                </p>
            </td>
        </tr>
    </table>

    @for($i = 1; $i <= $session->effectif_max; $i++)
      @if($i % 8 == 0)
	<div class="page-breaker"></div>
      @endif

        <table class="stagiaire-table">
            <tr>
                <th class="stagiaire-col">Stagiaire {{$i}}</th>
                <th colspan="2" class="adherent-col">Adhérent</th>
                <th colspan="2" class="financeur-col">Financeur 1</th>
                <th colspan="2" class="financeur-col">Financeur 2</th>
                <th class="inscription-col">Inscription</th>
            </tr>
            <tr>
                <td rowspan="3"></td>
                <td class="small">oui</td>
                <td class="small">non</td>
                <td class="header">€</td>
                <td></td>
                <td class="header">€</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2" class="fillable small">fact indiv.</td>
                <td rowspan="2" class="fillable small">fact autres</td>
                <td class="header">devis n°</td>
                <td></td>
                <td class="header">devis n°</td>
                <td></td>
                <th>Convention employeur</th>
            </tr>
            <tr>
                <td class="header">réglé</td>
                <td></td>
                <td class="header">réglé</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    @endfor
@endsection

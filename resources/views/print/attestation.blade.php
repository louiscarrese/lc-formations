@extends('layouts.print')

@section('css-file', 'css/attestation.css')

@section('content')
    @foreach($inscriptions as $inscription)
        <div class="stagiaire">
            <div class="header">
                <img class="logo" src="images/logo128.png" />
            </div>
            <h1>ATTESTATION DE FORMATION</h1>

            <div class="main">
                <p class="">
    Je, soussigné {{$responsableFormation}}, responsable des formations du Jardin Moderne, certifie que <strong>{{$inscription->stagiaire->prenom}} {{$inscription->stagiaire->nom}}</strong> a suivi avec assiduité la formation :
                </p>
                <p class="formation-title">
                    <strong>
                        {{$inscription->session->module->libelle}}
                    </strong>
                </p>
                <p>
    organisée par le JARDIN MODERNE.
                </p>

                <ul class="details">
                    @if($session->lastDate)
                        <li>Période : du {{\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y')}} au {{\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y')}}</li>
                    @else
                        <li>Période : le {{\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z',$session->firstDate)->format('d/m/Y')}}</li>
                    @endif
                    <li>Durée : {{$dureeFormation}} heures</li>
                    @if(count($formateurs) == 1)
                        <li>Intervenant : {{array_values($formateurs)[0]->prenom}} {{array_values($formateurs)[0]->nom}} </li>
                    @else
                        <li>Intervenants : {{implode(', ', $formateurs)}}</li>
                    @endif
                    <li>Lieu : {{$lieuFormation}}</li>
                </ul>

                <div class="signature">
                    <p>Fait à Rennes, le {{\Carbon\Carbon::now()->format('d/m/Y')}}</p>
                    <p>
                        Pour le Jardin Moderne<br/>
                    </p>
                    <p class="signature-placeholder"></p>
                    <p>{{$responsableFormation}}</p>
                </div>
            </div>
            <div class="footer">
                11 rue du Manoir de Servigné 35000 Rennes / 02 99 14 04 68 / www.jardinmoderne.org /  SIRET 419 541 719 00011 / APE 9499 Z<br/>
                Le Jardin Moderne est un organisme de formations enregistré sous le numéro 53 35 08308 35. Cet enregistrement ne vaut pas agrément de l'Etat.
            </div>
        </div>
    @endforeach

@endsection
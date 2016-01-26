@extends('layouts.print')

@section('css-file', 'css/emargement.css')

@section('content')
    @foreach($session->session_jours as $session_jour)
        <div class="session-jour">
            <img class="logo" src="images/logo64.png" />
            <h1>ETAT D'EMARGEMENT</h1>

            <div class="header">
                <div>
                    <span class="title">INTITULE DU STAGE : </span>
                    <span class="value">{{$session->module->libelle}}</span>
                </div>
                <div>
                    <span class="title">LIEU DU STAGE : </span>
                    <span class="value">{{$session_jour->lieu->libelle}}</span>
                </div>
                <div>
                    <span class="title">DATE DE L'EMARGEMENT : </span>
                    <span class="value">{{\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session_jour->date)->format('d/m/Y')}}</span>
                </div>
                <div>
                    <span class="title">NOM(S) DU / DES FORMATEUR(S) : </span>
                    <span class="value">
                        <?php $first = true; ?>
                        @foreach($session_jour->formateurs as $formateur)
                            <?php 
                                echo $first ? '' : ', ';
                                $first = false;
                            ?>
                            {{$formateur->nom}} {{$formateur->prenom}}
                        @endforeach
                    </span>
                </div>
            </div>

            <table class="emargement-table" >
                <thead>
                    <tr>
                        <th rowspan="2" class="stagiaire">NOMS - PRENOMS DES STAGIAIRES</th>
                        <th colspan="2" class="signature">EMARGEMENTS</th>
                        <th rowspan="2" class="nb-h">NOMBRES D'H STAGIAIRES</th>
                    </tr>
                    <tr>
                        <th>MATIN<br />De 9h30 à 12h30</th>
                        <th>APRES MIDI<br />De 13h30 à 17h30</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscriptions as $inscription)
                        <tr>
                            <td>{{$inscription->stagiaire->nom}} {{$inscription->stagiaire->prenom}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="mention-certif">
                            Certifié exact par l'organisme, par Rozenn LEBASTARD, responsable de formation,
                        </td>
                        <td class="total">TOTAL HEURES STAGIAIRES</td>
                        <td></td>
                </tbody>
            </table>
            <span>Signature : </span>
            <div class="footer">
                11 rue du Manoir de Servigné 35000 Rennes / 02 99 14 04 68 / www.jardinmoderne.org /  SIRET 419 541 719 00011 / APE 9499 Z
            </div>
        </div>
    @endforeach

@endsection

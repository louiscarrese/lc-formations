@extends('layouts.print')

@section('css-file', 'css/contrat.css')

@section('content')
<div class="content">
    <img class="logo" src="images/logo128.png" />
    <h1>
        CONVENTION DE FORMATION<br />
        (Articles L.6353-3 à L.6353-7 du Code du travail)
    </h1>
    <p>
        Entre les soussignés :
    </p>
        1) <strong>L’ASSOCIATION LE JARDIN MODERNE</strong>, N° de SIREN 419 541 719 00011<br />
        11, rue du Manoir de Servigné - 35000 RENNES<br />
        Déclaration d'activité enregistrée sous le numéro 53 35 08308 35 auprès du préfet de région de Bretagne
    </p>
    <p>
        2) <strong>{{$libelle_employeur}}</strong><br />
        {{$adresse_employeur}}
    </p>
    <div class="article">
        <p class="article-title">
            Article 1er : objet de la convention
        </p>
        En exécution de la présente convention, l'association <strong>LE JARDIN MODERNE</strong> s'engage à organiser une formation intitulée <strong>{{$libelle_module}}</strong>, qui se déroulera <strong>{{$dates}}</strong>, décrite à l'annexe ci-jointe dans les conditions fixées par les articles suivants. {{$libelle_employeur}} s'engage à assurer la présence d'un de leur salarié sur les formations susmentionnées.<br />
        Le participant sera : <strong>{{$nom_prenom_stagiaire}}<strong>
    </div>
    <div class="article">
        <p class="article-title">
            Article 2 : nature et caractéristiques de l’action de formation
        </p>
        a) L'action de formation envisagée entre dans l'une des catégories prévues à l'article L.6313-1 de la sixième partie du Code du travail.<br />
        b) Cette action de formation est définie par une annexe jointe à la présente convention, qui indique ses objectifs, son programme plus détaillé, sa durée, ses dates, ses horaires, l’effectif formé, le public présenté à la formation, le lieu de déroulement du stage, les moyens pédagogiques, le formateur, les modalités de suivi et appréciation des résultats.
    </div>
    <div class="article">
        <p class="article-title">
            Article 3 : dispositions financières
        </p>
        a) <strong>{{$libelle_employeur}}</strong>, en contrepartie de l'action de formation réalisée, s’engage à verser à l’association <strong>LE JARDIN MODERNE</strong>, une somme correspondant aux frais de formation de <strong>{{$montant}} € net de TVA</strong>.<br />
        b) L’association <strong>LE JARDIN MODERNE</strong> en contrepartie des sommes reçues, s’engage à réaliser l'action de formation prévue dans le cadre de la présente convention ainsi qu’à fournir tout document et pièce de nature à justifier la réalité et la validité des dépenses de formation engagées à ce titre.<br />
        c) Modalités de règlement : la facture est réglable dans un délai maximum de 15 jours à compter de la date de son émission.
    </div>
    <div class="article">
        <p class="article-title">
            Article 4 : résiliation de la convention
        </p>
        a) En cas de résiliation de la présente convention par <strong>{{$libelle_employeur}}</strong> à moins de 10 jours francs avant le début de la formation, l’association <strong>LE JARDIN MODERNE</strong> retiendra sur le coût total, les sommes qu’elle aura réellement dépensées ou engagées pour la résiliation de l’action.<br />
        b) En cas de modification unilatérale par l’association <strong>LE JARDIN MODERNE</strong> de l’un des éléments fixés à l’article 1er, se réserve le droit de mettre fin à la présente convention. Le délai d’annulation étant toutefois limité à 30 jours francs avant la date prévue de commencement de l’une des actions mentionnées à la présente convention. Il sera, dans ce cas, procédé à une résorption anticipé de la convention.
    </div>
    <div class="article">
        <p class="article-title">
            Article 5 : délai de rétractation
        </p>
        A compter de la date de signature du présent contrat, le stagiaire présenté par <strong>{{$libelle_employeur}}</strong> a un délai de 5 jours ouvrés pour se rétracter. Il en informe l’association <strong>LE JARDIN MODERNE</strong> par lettre au moins 14 jours ouvrés avant le début de la formation. Si la rétractation n’a pas eu lieu dans les 5 jours ouvrés suivant la commande ou si la période des 14 jours ouvrés n’est pas respectée, le coût de la formation sera intégralement payé par <strong>{{$libelle_employeur}}</strong> sur présentation de la facture.
    </div>
    <div class="article">
        <p class="article-title">
            Article 6 : date d’effet et durée de la convention
        </p>
        La présente convention prend effet <strong>{{$dates}}</strong>.<br />
        L’action de formation doit se dérouler au cours de cette période de validité.
    </div>
    <div class="article">
        <p class="article-title">
            Article 7 : différends éventuels
        </p>
        Si une contestation ou un différend ne peuvent être réglés à l’amiable, le Tribunal de Rennes sera seul compétent pour se prononcer sur le litige.
    </div>
    <div cclass="date">
        Fait en double exemplaire, à Rennes, le {{\Carbon\Carbon::now()->format('d/m/Y')}}
    </div>
    <div class="signature">
        <p>
            Pour <strong>{{$libelle_employeur}}</strong><br />
            (nom et qualité du signataire)
        </p>
        <p>
            Signature
        </p>
    </div>
    <div class="signature">
        <p>
            Pour l'<strong>ASSOCIATION LE JARDIN MODERNE</strong>
            {{$responsable_formation}}, responsable des formations
        </p>
        <p>
            Signature
        </p>
    </div>
    <div class="notice">
        <p>
            La convention est à renvoyer à l’adresse suivante :
        </p>
        <p>
            l'Association le Jardin Moderne, 11 rue du Manoir de Servigné (ZI Lorient) 35000 RENNES
        </p>
    </div>
    <div class="footer">
      <p>
	<span></span>
        <span>Tél : 02 99 14 04 68</span>
        <span>www.jardinmoderne.org</span>
	<span></span><br />
        N° de SIREN : 419 541 719 00011 – Code APE 9499 Z
      </p>
    </div>
</div>
@endsection

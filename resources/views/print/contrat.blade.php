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
    <p>
    1) <strong>L’ASSOCIATION LE JARDIN MODERNE</strong>, N° de SIREN 419 541 719 00011<br />
    11, rue du Manoir de Servigné - 35000 RENNES<br/>
    Déclaration d'activité enregistrée sous le numéro 53 35 08308 35 auprès du préfet de région de Bretagne
    </p>
    <p>
    2) <strong>{{$nom_prenom_stagiaire}}</strong><br />
    Rue du paradis, 35000 Rennes
    </p>
    <div class="article">
        <p class="article-title">
            Article 1er : objet de la convention
        </p>
    En exécution de la présente convention, l'association LE JARDIN MODERNE s'engage à organiser une formation intitulée <strong>{{$libelle_module}}</strong>, qui se déroulera <strong>{{$dates}}</strong>, décrite à l'annexe ci-jointe dans les conditions fixées par les articles suivants.
    </div>
    <div class="article">
        <p class="article-title">
            Article 2 : nature et caractéristiques de l’action de formation
        </p>
    a) L'action de formation envisagée entre dans l'une des catégories prévues à l'article L.6313-1 de la sixième partie du Code du travail.
    b) Cette action de formation est définie par une annexe jointe à la présente convention, qui indique ses objectifs, son programme plus détaillé, ses horaires, le public présenté à la formation, le lieu de déroulement du stage, les moyens pédagogiques, le formateur, les modalités de suivi et appréciation des résultats.
    A l'issue de la formation, une attestation de formation sera délivrée au stagiaire.
    Sa durée est fixée à <strong>{{$duree}}</strong> heures.
    Elle est organisée pour un effective de <strong>{{$effectif}}</strong> stagiaires.
    </div>
    <div class="article">
        <p class="article-title">
            Article 3 : Niveau de connaissances préalables nécessaire
        </p>
    Afin de suivre au mieux l'action de formation susvisée et atteindre les objectifs qu'elle vise, le stagiaire est informé qu'il est nécessaire de posséder, avant l'entrée en formation, les pré requis mentionnés dans le programme de chaque formation.
    </div>
    <div class="article">
        <p class="article-title">
            Article 4 : dispositions financières
        </p>
    a) <strong>{{$nom_prenom_stagiaire}}</strong>, en contrepartie de l'action de formation réalisée, s’engage à verser à l’association LE JARDIN MODERNE, une somme correspondant aux frais de formation de 300 €, net de TVA.
    b) L’association LE JARDIN MODERNE en contrepartie des sommes reçues, s’engage à réaliser l'action de formation prévue dans le cadre de la présente convention ainsi qu’à fournir tout document et pièce de nature à justifier la réalité et la validité des dépenses de formation engagées à ce titre.
    </div>
    <div class="article">
        <p class="article-title">
            Article 5 : résiliation de la convention
        </p>
    a) En cas de résiliation de la présente convention par <strong>{{$nom_prenom_stagiaire}}</strong> à moins de 10 jours francs avant le début de la formation, l’association LE JARDIN MODERNE retiendra sur le coût total, les sommes qu’elle aura réellement dépensées ou engagées pour la résiliation de l’action.
    b) En cas de modification unilatérale par l’association LE JARDIN MODERNE de l’un des éléments fixés à l’article 1er, se réserve le droit de mettre fin à la présente convention. Le délai d’annulation étant toutefois limité à 30 jours francs avant la date prévue de commencement de l’une des actions mentionnées à la présente convention. Il sera, dans ce cas, procédé à une résorption anticipée de la convention.
    </div>
    <div class="article">
        <p class="article-title">
            Article 6 : délai de rétractation
        </p>
    A compter de la date de signature du présent contrat, le stagiaire présenté par <strong>{{$nom_prenom_stagiaire}}</strong> a un délai de 5 jours ouvrés pour se rétracter. Il en informe l’association LE JARDIN MODERNE par lettre au moins 14 jours ouvrés avant le début de la formation. Si la rétractation n’a pas eu lieu dans les 5 jours ouvrés suivant la commande ou si la période des 14 jours ouvrés n’est pas respectée, le coût de la formation sera intégralement payé par <strong>{{$nom_prenom_stagiaire}}</strong> sur présentation de la facture.
    </div>
    <div class="article">
        <p class="article-title">
            Article 7 : Interruption du stage
        </p>
    Si le stagiaire est empêché de suivre la formation par suite de force majeure dûment reconnue, le contrat de formation professionnelle est résilié. Dans ce cas, seules les prestations effectivement dispensées sont dues au prorata temporis de leur valeur prévue au présent contrat.
    </div>
    <div class="article">
        <p class="article-title">
            Article 8 : différends éventuels
        </p>
    Si une contestation ou un différend ne peuvent être réglés à l’amiable, le Tribunal de Rennes sera seul compétent pour se prononcer sur le litige.
    </div>
    <p class="date">
    Fait en double exemplaire, à Rennes, le.....................................
    </p>
    <p class="signature stagiaire">
    Pour le stagiaire <strong>{{$nom_prenom_stagiaire}}</strong>
    Signature
    </p>
    <p class="signature jardin">
    Pour l'ASSOCIATION LE JARDIN MODERNE Rozenn Lebastard, responsable des formations
    Signature
    </p>
    <p class="notice">
    ￼La convention est à renvoyer à l’adresse suivante :
    l'Association le Jardin Moderne, 11 rue du Manoir de Servigné (ZI Lorient) 35000 RENNES
    </p>
    <p class="footer">
    Tél : 02 99 14 04 68 / Fax : 02 99 14 04 69 www.jardinmoderne.org N° de SIREN : 419 541 719 00011 – Code APE 9499 Z
    </p>
</div>
@endsection
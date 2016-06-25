<?php

namespace ModuleFormation\Services;

use Log;

class MailGeneratorService implements MailGeneratorServiceInterface{

    public function infosStagiairesToFormateur($session) {
        /** Get the different objects */
        /* Formateurs */
        $formateurs = array();
        //Get the SessionJours
        $sessionJours = $session->session_jours()->orderBy('date')->get();
        foreach($sessionJours as $sessionJour) {
            $formateurs = array_merge($formateurs, $sessionJour->formateurs()->get()->all());
        }

        //We don't want doubles
        $formateurs = $this->uniqueFormateurs($formateurs);

        //Extract emails
        $formateurEmails = array_map(array($this, "extractFormateurEmail"), $formateurs);


        /** Stagiaires */
        $stagiaires = array();
        foreach($session->inscriptions()->get() as $inscription) {
            if($inscription->statut == \ModuleFormation\Inscription::STATUS_VALIDATED) {
                $stagiaires[] = $inscription->stagiaire()->first();
            }
        }

        /** Libellé formation */
        $sessionLabel = $session->module()->first()->libelle;
        $sessionLabel .= " du " . $this->formatDate($sessionJours[0]->date);
        if(count($sessionJours) > 1) {
            $sessionLabel .= " au " . $this->formatDate($sessionJours[count($sessionJours) - 1]->date);
        }
        $adresses = implode(';', $formateurEmails);
        $subject = "Infos stagiaires pour la formation " . $sessionLabel;
        $body = <<<EOT
Bonjour ,
Vous trouverez ci dessous la liste des stagiaires inscrits à la formation {$session->module()->first()->libelle}.

EOT;
        foreach($session->inscriptions()->get() as $inscription) {
            $body .= "{$inscription->stagiaire()->first()->prenom} {$inscription->stagiaire()->first()->nom}" . PHP_EOL;
        }

        $mailHref = 'mailto:' . $adresses . '?subject=' . rawurlencode($subject) . '&body=' . rawurlencode($body);

        return $mailHref;
    }

    public function participants($session) {
        /** Get the different objects */
        /* Formateurs */
        $formateurs = array();
        //Get the SessionJours
        $sessionJours = $session->session_jours()->orderBy('date')->get();
        foreach($sessionJours as $sessionJour) {
            $formateurs = array_merge($formateurs, $sessionJour->formateurs()->get()->all());
        }

        //We don't want doubles
        $formateurs = $this->uniqueFormateurs($formateurs);

        //Extract emails
        $formateurEmails = array_map(array($this, "extractFormateurEmail"), $formateurs);

        /* Stagiaires */
        $stagiaireEmails = \ModuleFormation\Stagiaire::whereHas('inscriptions', function($q) use ($session) {
            $q->where('statut', '=', \ModuleFormation\Inscription::STATUS_VALIDATED)
            ->where('session_id', '=', $session->id);
        })->lists('email')->toArray();

        $to = implode(';', $stagiaireEmails);
        $cc = implode(';', $formateurEmails);

        return 'mailto:' . $to . '?cc=' . $cc;

    }


    private function extractFormateurEmail($formateur) {
        return $formateur->email;
    }

    private function uniqueFormateurs($formateurs) {
        //Re store the formateurs by index (so multiples auto-override)
        $ret = array();
        foreach($formateurs as $formateur) {
            $ret[$formateur->id] = $formateur;
        }

        //Reindex (useless ?)
        $ret = array_values($ret);

        return $ret;
    }

    private function formatDate($stringDate) {
        $date = \Carbon\Carbon::parse($stringDate);

        return $date->format('d/m/Y');
    }

}

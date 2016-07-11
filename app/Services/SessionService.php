<?php

namespace ModuleFormation\Services;

use DB;

use ModuleFormation\SessionJour;
use ModuleFormation\Inscription;

class SessionService implements SessionServiceInterface
{
    public function getMinMaxDates($sessionId) {
        $sessionJours = SessionJour::where('session_id', $sessionId)->orderBy('date')->get();

        if(count($sessionJours) > 1) {
            $min = $sessionJours[0]->date;
            $max = $sessionJours[count($sessionJours) - 1]->date;
            return ['first' => $min, 'last' => $max];
        } else if(count($sessionJours) == 1) {
            $min = $sessionJours[0]->date;
            return ['first' => $min, 'last' => null];
        } else {
            return null;
        }
    }

    public function getNbInscriptionsByStatut($sessionId) {
        $datas = Inscription::where('session_id', '=', $sessionId)
            ->groupBy('statut')
            ->select('statut', DB::Raw('count(id) as count'))
            ->get();

        $ret = array();
        foreach($datas as $data) {
            $ret[$data['statut']] = $data['count'];
        }

        return $ret;
    }
}
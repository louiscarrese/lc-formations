<?php

use Illuminate\Database\Seeder;
use ModuleFormation\StagiaireType;

class StagiaireTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Salarié', 
            'is_salarie' => true
            ));
        $stagiaire_type->save();
        
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Fonctionnaire', 
            'is_salarie' => true, 
            'is_fonctionnaire' => true
            ));
        $stagiaire_type->save();
        
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Salarié en contrat de professionalisation', 
            'is_salarie' => true, 
            'is_contrat_pro' => true
            ));
        $stagiaire_type->save();
        
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Demandeur d\'emploi', 
            'is_demandeur_emploi' => true
            ));
        $stagiaire_type->save();
        
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Demandeur d\'emploi RSA', 
            'is_demandeur_emploi' => true
            ));
        $stagiaire_type->save();
        
        $stagiaire_type = new StagiaireType(array(
            'libelle' => 'Demandeur d\'emploi intermittent', 
            'is_demandeur_emploi' => true
            ));
        $stagiaire_type->save();
    }
}

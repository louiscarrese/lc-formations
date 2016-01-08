<?php 
namespace ModuleFormation\Repositories;

class TarifRepository extends AbstractRepository implements TarifRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Tarif';


    protected function toModel($data, $seed = null) 
    {
        $tarif = ($seed == null ? new \ModuleFormation\Tarif : $seed);

        if(isset($data['id']))
            $tarif->id = $data['id'];
        $tarif->module_id = $data['module_id'];
        $tarif->tarif_type_id = $data['tarif_type_id'];
        $tarif->montant = $data['montant'];

        return $tarif;
    }
}
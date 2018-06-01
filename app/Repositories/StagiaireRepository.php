<?php 
namespace ModuleFormation\Repositories;

class StagiaireRepository extends AbstractRepository implements StagiaireRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Stagiaire';
    protected $isPaginated = true;

    protected function augmentListData($data) {
	$data = parent::augmentListData($data);

	if($data->tel_portable != null) {
	    $data->telephone = $data->tel_portable;
	} else if($data->tel_fixe != null) {
	    $data->telephone = $data->tel_fixe;
	} else {
	    $data->telephone = "";
	}
    }
}

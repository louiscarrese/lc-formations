<?php 
namespace ModuleFormation\Repositories;

class FormateurRepository extends AbstractRepository implements FormateurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Formateur';
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

<?php 
namespace ModuleFormation\Repositories;

class PreinscriptionSessionRepository extends AbstractRepository implements PreinscriptionSessionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\PreinscriptionSession';


    protected function augmentData($data) {
        $data['financement_type'] = array('id' => $data->financement);

        return $data;
    }

    protected function processIncomingData($data) {
        $data['financement'] = $data['financement_type']['id'];
        $data['session_id'] = $data['session']['id'];
        return $data;
    }
}
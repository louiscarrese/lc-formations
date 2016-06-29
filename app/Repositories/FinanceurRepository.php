<?php 
namespace ModuleFormation\Repositories;

class FinanceurRepository extends AbstractRepository implements FinanceurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Financeur';

    protected $financeurTypeRepository;

    function __construct($app, FinanceurTypeRepositoryInterface $financeurTypeRepository) {
        parent::__construct($app);
        $this->financeurTypeRepository = $financeurTypeRepository;
    }

    protected function augmentData($data) {
        //Add financeur type
        $data->financeur_type = $this->financeurTypeRepository->find($data->financeur_type_id);
    }
}
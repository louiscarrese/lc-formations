<?php 
namespace ModuleFormation\Repositories;

class FinanceurRepository extends AbstractRepository implements FinanceurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Financeur';
    protected $isPaginated = true;
    
    protected $financeurTypeRepository;

    function __construct($app, FinanceurTypeRepositoryInterface $financeurTypeRepository) {
        parent::__construct($app);
        $this->financeurTypeRepository = $financeurTypeRepository;
    }

    protected function augmentData($data) {
        //Add financeur type
        $data = $this->fillFinanceurType($data);
	return $data;
    }

    protected function augmentListData($data) {
         $data = $this->fillFinanceurType($data);
	 return $data;
   }

    private function fillFinanceurType($data) {
        $data->financeur_type = $this->financeurTypeRepository->find($data->financeur_type_id);
        return $data;
    }
}
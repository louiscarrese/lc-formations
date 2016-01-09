<?php 
namespace ModuleFormation\Repositories;

class ModuleRepository extends AbstractRepository implements ModuleRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Module';

    function __construct($app, FormateurRepositoryInterface $formateurRepository) {
        parent::__construct($app);
        $this->formateurRepository = $formateurRepository;

        $this->relations = [
            'formateurs' => [
                'data_id' => 'formateurs_id',
                'repository' => $this->formateurRepository,
                'relation_method' => 'formateurs'
            ]
        ];
    }
}
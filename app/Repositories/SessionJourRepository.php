<?php 
namespace ModuleFormation\Repositories;

class SessionJourRepository extends AbstractRepository implements SessionJourRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\SessionJour';

    private $formateurRepository;

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
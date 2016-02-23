<?php

namespace ModuleFormation\Services;

use ModuleFormation\Repositories\EmployeurRepositoryInterface;
use ModuleFormation\Repositories\FinanceurRepositoryInterface;
use ModuleFormation\Repositories\FormateurRepositoryInterface;
use ModuleFormation\Repositories\ModuleRepositoryInterface;
use ModuleFormation\Repositories\StagiaireRepositoryInterface;

class SearchService implements SearchServiceInterface
{
    private $employeurRepository;
    private $financeurRepository;
    private $formateurRepository;
    private $moduleRepository;
    private $stagiaireRepository;

    public function __construct(
        EmployeurRepositoryInterface $employeurRepository,
        FinanceurRepositoryInterface $financeurRepository,
        FormateurRepositoryInterface $formateurRepository,
        ModuleRepositoryInterface $moduleRepository,
        StagiaireRepositoryInterface $stagiaireRepository)        
    {
        $this->employeurRepository = $employeurRepository;
        $this->financeurRepository = $financeurRepository;
        $this->formateurRepository = $formateurRepository;
        $this->moduleRepository = $moduleRepository;
        $this->stagiaireRepository = $stagiaireRepository;
    }


    public function search($query)
    {
        $ret = array();

        $employeurs = $this->employeurRepository->search([$query]);
        $financeurs = $this->financeurRepository->search([$query]);
        $formateurs = $this->formateurRepository->search([$query]);
        $modules = $this->moduleRepository->search([$query]);
        $stagiaires = $this->stagiaireRepository->search([$query]);

        if(count($employeurs))
            $ret['employeurs'] = $employeurs;
        if(count($financeurs))
            $ret['financeurs'] = $financeurs;
        if(count($formateurs))
            $ret['formateurs'] = $formateurs;
        if(count($modules))
            $ret['modules'] = $modules;
        if(count($stagiaires))
            $ret['stagiaires'] = $stagiaires;

        return $ret;
    }
 }
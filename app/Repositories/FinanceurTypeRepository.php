<?php 
namespace ModuleFormation\Repositories;

class FinanceurTypeRepository extends AbstractStaticRepository implements FinanceurTypeRepositoryInterface
{
    protected $data = [
        1 => ['id' => 1, 'libelle' => 'Personnel'],
        2 => ['id' => 2, 'libelle' => 'Employeur'],
        3 => ['id' => 3, 'libelle' => 'OPCA'],
        4 => ['id' => 4, 'libelle' => 'Instances européennes'],
        5 => ['id' => 5, 'libelle' => 'Etat'],
        6 => ['id' => 6, 'libelle' => 'Conseils régionaux'],
        7 => ['id' => 7, 'libelle' => 'Pôle emploi'],
        8 => ['id' => 8, 'libelle' => 'Autres ressources publiques'],
    ];

}
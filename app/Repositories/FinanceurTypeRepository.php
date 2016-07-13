<?php 
namespace ModuleFormation\Repositories;

class FinanceurTypeRepository extends AbstractStaticRepository implements FinanceurTypeRepositoryInterface
{
    protected $data = [
        ['id' => 1, 'libelle' => 'Personnel'],
        ['id' => 2, 'libelle' => 'Employeur'],
        ['id' => 3, 'libelle' => 'OPCA'],
        ['id' => 4, 'libelle' => 'Instances européennes'],
        ['id' => 5, 'libelle' => 'Etat'],
        ['id' => 6, 'libelle' => 'Conseils régionaux'],
        ['id' => 7, 'libelle' => 'Pôle emploi'],
        ['id' => 8, 'libelle' => 'Autres ressources publiques'],
    ];

}
<?php 
namespace ModuleFormation\Repositories;

class ParametreRepository extends AbstractRepository implements ParametreRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Parametre';


    public function responsableFormation() {
        $value = $this->findBy(['key' => 'responsable_formations'])->first()->value;

        return $value;
    }

    public function debutSaison() {
        $stringValue = $this->findBy(['key' => 'debut_saison'])->first()->value;

        $value = \Carbon\Carbon::createFromFormat('d/m/Y', $stringValue);

        return $value;
    }
}
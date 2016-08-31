<?php 
namespace ModuleFormation\Repositories;

use ModuleFormation\Parametre;

/**
 * This repository does not inherit from AbstractRepository because :
 * - it would lead to a dependency loop
 * - we want to optimize by caching
 */
class ParametreRepository implements ParametreRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Parametre';

    private $cache = array();

    /** Parameters formating interfaces */
    public function responsableFormation() {
        $value = $this->findByKey('responsable_formations');

        return $value;
    }

    public function debutSaison() {
        $stringValue = $this->findByKey('debut_saison');

        $value = \Carbon\Carbon::createFromFormat('d/m/Y', $stringValue);

        return $value;
    }

    public function paginationThreshold() {
        $stringValue = $this->findByKey('pagination_threshold');

        return intval($stringValue);
    }

    /** CRUD */
    public function find($id) {
        $data = Parametre::findOrFail($id);

        $this->cache[$data->key] = $data->value;

        return $data;
    }

    public function getAll() {
        $datas = Parametre::all();

        foreach($datas as $data) {
            $this->cache[$data['key']] = $data['value'];
        }

        return $datas;
    }

    public function store($data, $id = null) {

        //If it's an update, refill the existing object
        $object = null;
        if($id != null) {
            $object = Parametre::findOrFail($id);            
            $object->fill($data)->save();
        } else {
            //If it's a create, mass assign
            $object = Parametre::create($data);
        }

        $this->cache[$object->key] = $object->value;

        $data = Parametre::find($object->id);
        return $data;
    }

    public function destroy($id) {
        $object = $this->find($id);
        unset($this->cache[$object->key]);

        Parametre::destroy($id);
    }


    /**
     * Select resource based on criterias.
     */
    private function findByKey($key) 
    {
        if(!isset($this->cache[$key])) {
            $this->cache[$key] = Parametre::where('key', $key)->first()->value;
        }

        return $this->cache[$key];
    }
}
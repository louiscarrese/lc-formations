<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AbstractModel extends Model
{
    protected $dbDateFormat = 'Y-m-d';
    protected $frontDateFormat = 'Y-m-d\TH:i:s.u\Z';

    protected static $myDates = [];

    protected function dateGetter($value) {
        if($value != null) {
            $date = Carbon::createFromFormat($this->dbDateFormat, $value);
            $date->hour = 0;
            $date->minute = 0;
            $date->second = 0;
            return $date->format($this->frontDateFormat);
        } else {
            return null;
        }
    }

    protected function dateSetter($key, $value) {
        if($value != null) {
            $date = Carbon::createFromFormat($this->frontDateFormat, $value);
            $this->attributes[$key] = $date;
        } else {
            $this->attributes[$key] = null;
        }

        return $this->attributes[$key];
    }

    protected function mutateAttribute($key, $value) {
        if(in_array($key, static::$myDates)) {
            return $this->dateGetter($value);
        } else {
            return parent::mutateAttribute($key, $value);
        }
    }

    public function setAttribute($key, $value) {
        if(in_array($key, static::$myDates)) {
            return $this->dateSetter($key, $value);
        } else {
            return parent::setAttribute($key, $value);
        }
    }

    public static function cacheMutatedAttributes($class) {
        Model::cacheMutatedAttributes($class);
        static::$mutatorCache[$class] = array_merge(static::$mutatorCache[$class], static::$myDates);
    }
}
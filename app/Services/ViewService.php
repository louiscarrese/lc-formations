<?php

namespace ModuleFormation\Services;

class ViewService {
    public function displayedField($fieldId, $displayedField, $prefix) {
        $displayed = "";
        if($displayedField != null) {
            $find[] = '{{';
            $replace[] = '{{'.$prefix;
            $displayed = str_replace($find, $replace, $displayedField);
        } else {
            $displayed = "{{".$prefix.$fieldId."}}";
        }
        return $displayed;
    }

    public function privateUrl($url) {
        return '/intra/' . $url;
    }
}
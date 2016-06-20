<?php

namespace ModuleFormation\Services;

class ViewService {
    public function displayedField($fieldId, $field) {
        $displayed = "";
        if(isset($field["displayedField"])) {
            $find[] = '{{';
            $replace[] = '{{item.';
            $displayed = str_replace($find, $replace, $field['displayedField']);
        } else {
            $displayed = "{{item.".$fieldId."}}";
        }
        return $displayed;
    }

    public function privateUrl($url) {
        return '/intra/' . $url;
    }
}
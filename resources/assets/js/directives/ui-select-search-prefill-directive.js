function uiSelectSearchPrefill() {
  return {
    require: 'uiSelect',
    link: function(scope, element, attrs, $select) {
        attrs.$observe('uiSelectSearchPrefill', function(val) {
            $select.search = val;
        });
/*
        var value = attrs.uiSelectSearchPrefill;
        $select.search = value;
        */
    }
  };
}
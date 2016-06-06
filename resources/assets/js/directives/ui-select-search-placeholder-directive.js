function uiSelectSearchPlaceholder() {
  return {
    require: 'uiSelect',
    link: function(scope, element, attrs, $select) {
        $select.originalPlaceholder = $select.placeholder;

        scope.$watch('$select.search', function(newValue, oldValue) {
            if(newValue != '') {
                $select.placeholder = newValue;
            } else {
                $select.placeholder = $select.originalPlaceholder;
            }
        })
    }

  };
}
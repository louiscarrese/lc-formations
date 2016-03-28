//Just like a required validator
function recommendedDirective() {
    return {
        require: 'ngModel',
        link: function(scope, elm, attrs, ctrl) {
          ctrl.$validators.recommended = function(modelValue, viewValue) {
            return !ctrl.$isEmpty(modelValue);
          };
        }
    };
}
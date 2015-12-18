function myEditableDirectiveTime($filter) {
    function stringtoUTCTime(input) {
        var iso8601String = '1970-01-01T' + input;

        var time = new Date(iso8601String);

        return time; 
    }

    var directive = {
        restrict: 'E',
        
        scope: 
        {
            ngModel: '=',
            editingFlag: '=',
        },
        controller: function($scope) {},
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr['ngModel']);

            var template = '';
            template += '<p class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel}}</p>';
            template += '<uib-timepicker ng-model="localModel" ng-show="editingFlag" ';
            template += 'minute-step="15" show-meridian="false" show-spinners="false">'
            template += '</uib-timepicker>'
            template += this.validationTemplate(fieldName);

            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
            scope.localModel = new Date();

            var unbind = scope.$watch('ngModel', function(newValue, oldValue) {
                if(newValue != oldValue) {
                    scope.localModel = stringtoUTCTime(newValue);
                    unbind();
                }
            });

            scope.$watch('localModel', function(newValue, oldValue) {
                if(newValue != oldValue) {
                    ctrls[1].$setViewValue($filter('date')(newValue, 'HH:mm:ss'));
                }
            });

        }
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}
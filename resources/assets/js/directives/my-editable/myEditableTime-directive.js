function myEditableDirectiveTime($filter) {
    var directive = {
        restrict: 'E',
        
        scope: 
        {
            ngModel: '=',
            editingFlag: '=',
            timeFormat: '@' 
        },
        controller: function($scope) {},
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr['ngModel']);

            var template = '';
            template += '<p class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel | date:\'' + tAttr['timeFormat'] + '\':\'UTC\'}}</p>';
            template += '<uib-timepicker ng-model="ngModel" ng-show="editingFlag" ';
            template += 'minute-step="15" show-meridian="false" show-spinners="false" datepicker-localdate>'
            template += '</uib-timepicker>'
            template += this.validationTemplate(fieldName);

            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
/*
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
*/

        }
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}
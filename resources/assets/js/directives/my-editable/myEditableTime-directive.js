function myEditableDirectiveTime() {
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
            template += '<span class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel | date:\'' + tAttr['timeFormat'] + '\'}}</span>';

            template += '<input type="text" dn-timepicker="HH:mm" ng-model="ngModel" ng-show="editingFlag" ';
            template += 'min-time="08:00" max-time="23:00" ' ;
            template += 'size="3" '
            template += '/>';

            template += this.validationTemplate(fieldName);

            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
        }
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}

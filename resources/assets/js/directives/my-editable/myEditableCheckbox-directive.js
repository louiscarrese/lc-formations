function myEditableDirectiveCheckbox() {
    var directive = {
        restrict: 'E',
        scope: {
            ngModel: '=',
            editingFlag: '=',
        },
        require: ['^form'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr.ngModel);

            var template = '';

            template += '<input type="checkbox" ng-disabled="!editingFlag" ng-model="ngModel" name="' + fieldName + '" ' + htmlAttrs + '"/>';

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
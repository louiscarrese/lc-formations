function myEditableDirectiveInteger() {
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

            template += '<span class="editable-read" ng-if="!editingFlag" ' + htmlAttrs + '>{{ngModel}}</span>';
            template += '<input type="text" ng-if="editingFlag" ng-model="ngModel" name="' + fieldName + '" ' + htmlAttrs + ' class="form-control input-sm" my-force-integer/>';

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
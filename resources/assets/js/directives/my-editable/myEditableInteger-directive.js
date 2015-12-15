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

            template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel}}</span>';
            template += '<input type="text" ng-show="editingFlag" ng-model="ngModel" name="' + fieldName + '" ' + htmlAttrs + ' class="form-control input-sm" my-force-integer/>';

            template += this.validationTemplate();
            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
        }
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}
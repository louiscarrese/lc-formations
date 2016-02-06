function myEditableDirectiveRadio() {
    var directive = {
        restrict: 'E',
        scope: {
            ngModel: '=',
            editingFlag: '=',
            values: '=',
        },
        require: ['^form'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr.ngModel);

            var template = '';

            template += '<span class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel}}</span>';
            template += '<label ng-repeat="item in values" ng-show="editingFlag" class="radio-inline">';
            template += '<input type="radio" name="' + fieldName + '" ng-model="$parent.ngModel" value="{{item}}"> {{item}} </input>';
            template += '</label>';

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

function myEditableDirectiveEmail() {

    var directive = {
        restrict: 'E',
        
        scope: 
        {
            ngModel: '=',
            editingFlag: '=',
        },
        controller: function($scope) {},
        require: ['^form'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr['ngModel']);

            var template = '';
            template += '<span class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '><a href="mailto:{{ngModel}}">{{ngModel}}</a></span>';
            template += '<input type="email" ng-show="editingFlag" ng-model="ngModel" name="' + fieldName + '" ' + htmlAttrs + ' class="form-control input-sm" />';
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
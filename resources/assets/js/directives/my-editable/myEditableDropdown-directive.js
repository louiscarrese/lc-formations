function myEditableDirectiveDropdown() {
    var directive = {
        restrict: 'E',
        scope: {
            ngModel: '=',
            modelLabel: '=',
            editingFlag: '=',
            source: '=',
            sourceId: '@',
            sourceLabel: '@',
            change: '=',
        },
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr.ngModel);

            var ngOptionsString = 'item.' + tAttr.sourceId + ' as item.' + tAttr.sourceLabel + ' for item in source';

            var template = '';
 
            template += '<p class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{modelLabel}}</p>';
            template += '<select ng-show="editingFlag" ng-options="' + ngOptionsString + '"';
            template += ' ng-model="ngModel" name="' + fieldName + '" ';
            if(tAttr['change'] != undefined) {
                template += ' ng-change="change(ngModel)"';
            }
            template +=' ' + htmlAttrs + ' class="form-control"></select>';

            template += this.validationTemplate(fieldName);
            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
        },
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}

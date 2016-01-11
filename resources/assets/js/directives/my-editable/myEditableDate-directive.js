function myEditableDirectiveDate() {

    var directive = {
        restrict: 'E',
        
        scope: 
        {
            ngModel: '=',
            editingFlag: '=',
            dateFormat: '@',
        },
        controller: function($scope) {},
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr['ngModel']);

            var template = '';
            template += '<p class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{ngModel | date:\'' + tAttr['dateFormat'] + '\'}}</p>';
            template += '<p class="input-group" ng-show="editingFlag" ' + htmlAttrs + '>';
            template += '<input type="text" class="form-control" ng-model="ngModel" uib-datepicker-popup="' + tAttr['dateFormat'] + '" ';
            template += 'is-open="status.opened" ';
            template += 'show-button-bar="false" ';
            template += 'name="' + fieldName +'" ';
            template += htmlAttrs + ' '; 
            template += 'datepicker-localdate></input>';
            template += ' <span class="input-group-btn">';
            template += '  <button type="button" class="btn btn-default" ng-click="open($event)" >';
            template += '  <i class="glyphicon glyphicon-calendar"></i></button>';
            template += ' </span>';
            template += '</p>';
            template += this.validationTemplate(fieldName);

            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
            scope.status = {};
            scope.localModel = null;

            scope.open = function($event) {
                scope.status.opened = true;
            };
        }
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}

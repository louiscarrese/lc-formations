function myEditableDirective() {
    return {
        restrict: 'E',
        scope: {
            type: '@',
            model: '=',
            editingFlag: '=',
            source: '='
        },
        template: function(tElem, tAttr) {
            var template = '';
            if(tAttr['type'] === 'text') {
                template += '<span ng-hide="editingFlag">{{model}}</span>';
                template += '<input type="text" ng-show="editingFlag" ng-model="model" size="1" />';
            } else if(tAttr['type'] === 'integer') {
                template += '<span ng-hide="editingFlag">{{model}}</span>';
                template += '<input type="text" ng-show="editingFlag" ng-model="model" size="1" my-force-integer/>';
            } else if(tAttr['type'] === 'checkbox') {
                template += '<input type="checkbox" ng-disabled="editingFlag" ng-model="model" />';
            } else if(tAttr['type'] === 'dropdown') {
                template += '<span ng-hide="editingFlag">{{model}}</span>';
                template += '<select ng-show="editingFlag" ng-options="item.id as item.libelle for item in source" ng-model="model"></select>';
            } else {
                template += "Erreur de type !";
            }
            return template;

        }


    };
};
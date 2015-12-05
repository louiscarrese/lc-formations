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
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var template = '';

            switch(tAttr['type']) {
                case 'text': 
                    template += '<span ng-hide="editingFlag" ' + this.attrToHtml(filteredAttr) + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" ' + this.attrToHtml(filteredAttr) + '/>';
                    break;
                case 'integer':
                    template += '<span ng-hide="editingFlag" ' + this.attrToHtml(filteredAttr) + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" my-force-integer ' + this.attrToHtml(filteredAttr) + '/>';
                    break;
                case 'checkbox':
                    template += '<input type="checkbox" ng-disabled="editingFlag" ng-model="model" ' + this.attrToHtml(filteredAttr) + '/>';
                    break;
                case 'dropdown':
                    template += '<span ng-hide="editingFlag" ' + this.attrToHtml(filteredAttr) + '>{{model}}</span>';
                    template += '<select ng-show="editingFlag" ng-options="item.id as item.libelle for item in source" ng-model="model" ' + this.attrToHtml(filteredAttr) + '></select>';
                    break;
                default:
                    template += "Erreur de type !";
                    break;
            }
            return template;

        },

        stripScopeAttributes: function(tAttr) {
            var ret = {};
            for(var attr in tAttr) {
                if(tAttr.hasOwnProperty(attr)) {
                    if(!this.scope.hasOwnProperty(attr)) {
                        ret[attr] = tAttr[attr];
                    }
                }
            }
            return ret;
        },

        attrToHtml: function(attr) {
            var ret = '';
            for(var key in attr) {
                ret += key + '="' + attr[key] + '" ';
            }
            return ret;
        }
    };
};
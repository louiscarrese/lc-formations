function myEditableDirective() {
    return {
        restrict: 'E',
        scope: {
            type: '@',
            model: '=',
            modelLabel: '=',
            editingFlag: '=',
            source: '=',
            sourceId: '=',
            sourceLabel: '=',
            change: '='
        },
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var template = '';

            switch(tAttr['type']) {
                case 'text': 
                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" ' + htmlAttrs + '/>';
                    break;
                case 'textarea':
                    template += '<pre ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</pre>';
                    template += '<textarea ng-show="editingFlag" ng-model="model" ' + htmlAttrs + '></textarea>';
                    break;
                case 'integer':
                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" my-force-integer ' + htmlAttrs + '/>';
                    break;
                case 'checkbox':
                    template += '<input type="checkbox" ng-disabled="!editingFlag" ng-model="model" ' + htmlAttrs + '/>';
                    break;
                case 'dropdown':
                    var ngOptionsString = 'item.' + tAttr.sourceId + ' as item.' + tAttr.sourceLabel + ' for item in source';

                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{modelLabel}}</span>';
                    template += '<select ng-show="editingFlag" ng-options="' + ngOptionsString + '"';
                    template += ' ng-model="model"';
                    if(tAttr['change'] != undefined) {
                        template += ' ng-change="change()"';
                    }
                    template +=' ' + htmlAttrs + '></select>';
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
        },

    };
};
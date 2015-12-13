function myEditableDirective() {
    return {
        restrict: 'E',
        scope: {
            type: '@',
            model: '=ngModel',
            modelLabel: '=',
            editingFlag: '=',
            source: '=',
            sourceId: '=',
            sourceLabel: '=',
            change: '='
        },
        require: ['^form'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr.ngModel);

            var template = '';
            switch(tAttr['type']) {
                case 'text': 
                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" name="' + fieldName + '" ' + htmlAttrs + '/>';
                    break;
                case 'textarea':
                    template += '<pre ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</pre>';
                    template += '<textarea ng-show="editingFlag" ng-model="model" name="' + fieldName + '" ' + htmlAttrs + '></textarea>';
                    break;
                case 'integer':
                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{model}}</span>';
                    template += '<input type="text" ng-show="editingFlag" ng-model="model" name="' + fieldName + '" my-force-integer ' + htmlAttrs + '/>';
                    break;
                case 'checkbox':
                    template += '<input type="checkbox" ng-disabled="!editingFlag" ng-model="model" name="' + fieldName + '" ' + htmlAttrs + '/>';
                    break;
                case 'dropdown':
                    var ngOptionsString = 'item.' + tAttr.sourceId + ' as item.' + tAttr.sourceLabel + ' for item in source';
 
                    template += '<span ng-hide="editingFlag" ' + htmlAttrs + '>{{modelLabel}}</span>';
                    template += '<select ng-show="editingFlag" ng-options="' + ngOptionsString + '"';
                    template += ' ng-model="model" name="' + fieldName + '" ';
                    if(tAttr['change'] != undefined) {
                        template += ' ng-change="change()"';
                    }
                    template +=' ' + htmlAttrs + '></select>';
                    break;
                default:
                    template += "Erreur de type !";
                    break;
            }



            template += '<div class="tooltip" ng-messages="form.' + fieldName + '.$error" ng-if="form.' + fieldName + '.$invalid">';
            template += '<p ng-message="required">Ce champ est obligatoire</p>';
            template += '<p ng-message="minlength">Ce champ est trop court</p>';
            template += '<p ng-message="maxlength">Ce champ est trop long</p>';
            template += '<p ng-message="email">Ce champ n\'est pas un email valide</p>';
            template += '<p ng-message="number">Ce champ n\'est pas un nombre valide</p>';
            template += '<p ng-message="date">Ce champ n\'est pas une date valide</p>';
            template += '</div>';

            return template;

        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];
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
 

        getFieldName: function(modelName) {
            var names = modelName.split('.');
            return names[names.length-1];
        }
    };
};
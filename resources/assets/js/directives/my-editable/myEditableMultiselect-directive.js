function myEditableDirectiveMultiselect() {

    var directive = {
        restrict: 'E',
        
        scope: 
        {
            ngModel: '=',
            editingFlag: '=',
            datasource: '=',
            modelObjects: '=',
            displayed: '@',
            placeholder: '@'
        },
        controller: function($scope) {},
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr['ngModel']);

            var template = '';
            template += '<p class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>{{(displayValues(modelObjects, displayed))}}</p>';
            template += '<select2 ng-model="ngModel" class="form-control" multiple="multiple" ng-show="editingFlag" ';
            template += 'options="{placeholder: placeholder}" ';
            template += 's2-options="val.' + tAttr['sourceId'] + ' as (displayValue(val, displayed)) for val in datasource" ';
            if(tAttr['change'] != undefined) {
                template += 'ng-change="change(ngModel)" ';
            }
            template += '></select2>';
            template += this.validationTemplate(fieldName);

            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];

            scope.displayValues = function(values, formatString) {
                ret = '';
                if(values != undefined) {
                    for(var i = 0; i < values.length; i++) {
                        ret += scope.displayValue(values[i], formatString);
                        ret += (i != values.length - 1) ? ', ' : ''; 
                    }
                }
                return ret;
            }; 

            scope.displayValue = function(value, formatString) {
                var ret = '';
                if(value != undefined) {
                    var tokenizer = /(<\w+>)/g
                    var formatString = formatString;
                    var ret = formatString;
                    var toReplace = formatString.match(tokenizer);

                    for(var i = 0; i < toReplace.length; i++) {
                        var fieldId = toReplace[i].replace('<', '').replace('>', '');
                        ret = ret.replace(toReplace[i], value[fieldId]);
                    }
                }

                return ret;
            };
        },

    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}

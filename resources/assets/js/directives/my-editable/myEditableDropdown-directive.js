function myEditableDirectiveDropdown() {
    var directive = {
        restrict: 'E',
        scope: {
            ngModel: '=',
            editingFlag: '=',
            datasource: '=',
            modelObject: '=',
            sourceId: '@',
            change: '=',
            displayed: '@',
            placeholder: '@',
            href: '@'
        },
        require: ['^form', 'ngModel'],
        template: function(tElem, tAttr) {
            var filteredAttr = this.stripScopeAttributes(tAttr);
            var htmlAttrs = this.attrToHtml(filteredAttr);
            var fieldName = this.getFieldName(tAttr.ngModel);

            var template = '';
            template += '<span class="editable-read" ng-hide="editingFlag" ' + htmlAttrs + '>';
            if(tAttr['href']) {
                template += '<a href="' + tAttr['href'] +'{{ngModel}}">';
            }
            template += '{{(displayValue(modelObject, displayed))}}';
            if(tAttr['href']) {
                template += '</a>';
            }
            template += '</span>';
            template += '<select2 ng-model="ngModel" class="form-control" ng-show="editingFlag" ';
            template += 'options="{minimumResultsForSearch: 5, placeholder: placeholder}" ';
            template += 's2-options="val.' + tAttr['sourceId'] + ' as (displayValue(val, displayed)) for val in datasource" ';
            if(tAttr['change'] != undefined) {
                template += 'ng-change="change(ngModel)" ';
            }
            template += htmlAttrs + '></select2>';
            template += this.validationTemplate(fieldName);
            return template;
        },
        link: function(scope, element, attrs, ctrls) {
            scope.form = ctrls[0];

            scope.displayValue = function(value, formatString) {
                var ret = '';
                if(value != undefined) {
                    var tokenizer = /(<[\w.]+>)/g
                    var ret = formatString;

                    //Extract tokens we have to replace
                    var toReplace = formatString.match(tokenizer);

                    if(toReplace != null) {
                        //For each token we have to replace
                        for(var i = 0; i < toReplace.length; i++) {
                            //get the field name
                            var fieldId = toReplace[i].replace('<', '').replace('>', '');

                            //If it's a structure field (sthg.else)
                            if(fieldId.indexOf('.') != -1) {
                                //a place to store the objects while we go down
                                var localValue = value;

                                //Extract a path to the targeted field
                                var fieldPath = fieldId.split('.');

                                //Go down the path
                                for(var j = 0; j < fieldPath.length; j++) {
                                    if(localValue.hasOwnProperty(fieldPath[j])) {
                                        localValue = localValue[fieldPath[j]];
                                    }
                                }

                                //replace with the field value
                                ret = ret.replace(toReplace[i], localValue);
                            } else {
                                //replace with the field value
                                ret = ret.replace(toReplace[i], value[fieldId]);
                            }
                        }
                    }
                }
                return ret;
            };
        },
    };

    directive = angular.extend(directive, myEditableDirectiveCommons());

    return directive;
}

function myEditableDirectiveCommons() {
    return {

        validationTemplate: function(fieldName) {
            var template = '';

            template += '<div ng-messages="form.' + fieldName + '.$error" ng-if="form.' + fieldName + '.$invalid && form.' + fieldName + '.$touched">';
            template += '<span class="help-block" ng-message="required">Ce champ est obligatoire</span>';
            template += '<span class="help-block" ng-message="minlength">Ce champ est trop court</span>';
            template += '<span class="help-block" ng-message="maxlength">Ce champ est trop long</span>';
            template += '<span class="help-block" ng-message="email">Ce champ n\'est pas un email valide</span>';
            template += '<span class="help-block" ng-message="number">Ce champ n\'est pas un nombre valide</span>';
            template += '<span class="help-block" ng-message="date">Ce champ n\'est pas une date valide</span>';
            template += '</div>';

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
 

        getFieldName: function(modelName) {
            var names = modelName.split('.');
            return names[names.length-1];
        }
    }
}
function myEditableDirectiveCommons() {
    return {

        validationTemplate: function(fieldName) {
            var template = '';

            template += '<div class="tooltip" ng-messages="form.' + fieldName + '.$error" ng-if="form.' + fieldName + '.$invalid && form.' + fieldName + '.$touched">';
            template += '<p ng-message="required">Ce champ est obligatoire</p>';
            template += '<p ng-message="minlength">Ce champ est trop court</p>';
            template += '<p ng-message="maxlength">Ce champ est trop long</p>';
            template += '<p ng-message="email">Ce champ n\'est pas un email valide</p>';
            template += '<p ng-message="number">Ce champ n\'est pas un nombre valide</p>';
            template += '<p ng-message="date">Ce champ n\'est pas une date valide</p>';
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
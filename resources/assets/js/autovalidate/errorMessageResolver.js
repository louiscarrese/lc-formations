angular.module('jcs-autoValidate')
    .run([
    'defaultErrorMessageResolver',
    function (defaultErrorMessageResolver) {
        // passing a culture into getErrorMessages('fr-fr') will get the culture specific messages
        // otherwise the current default culture is returned.
        defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages) {
            errorMessages['defaultMsg'] = 'Please add error message for {0}';
            errorMessages['email'] = 'Ce champ n\'est pas une adresse email valide';
            errorMessages['minlength'] = 'Ce champ doit faire au moins {0} caractères';
            errorMessages['maxlength'] = 'Ce champ doit faire au plus {0} caractères';
            errorMessages['min'] = 'Ce champ doit être un nombre supérieur à {0}';
            errorMessages['max'] = 'Ce champ doit être un nombre inférieur à {0}';
            errorMessages['required'] = 'Ce champ est requis';
            errorMessages['date'] = 'Ce champ n\'est pas une date valide';
            errorMessages['pattern'] = 'Ce champ ne correspond pas au motif {0}';
            errorMessages['number'] = 'Ce champ n\'est pas un nombre valide';
            errorMessages['url'] = 'Ce champ n\'est pas une URL valide';

            errorMessages['recommended'] = 'Ce champ permet de traiter votre demande plus rapidement';
        });
    }
]);

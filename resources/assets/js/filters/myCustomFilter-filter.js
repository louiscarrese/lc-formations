function myCustomFilter() {
    return function(input, filter) {
        var outArray = [];
        var lowerFilter = angular.lowercase(filter) || '';

        //Pour chaque élément du tableau
        for(elemId = 0; elemId < input.length; elemId++) {
            //Pour chaque champ à analyser
            for(fieldId = 2; fieldId < arguments.length; fieldId++) {
                //On découpe, au cas où ça serait un sous objet (genre objet.propriete)
                var fieldPath = arguments[fieldId].split('.');
                //On démarre sur l'élément du tableau
                var fieldValue = input[elemId];
                //On descend chaque champ de l'arborescence
                for(var i = 0; i < fieldPath.length; i++) {
                    fieldValue = fieldValue[fieldPath[i]];
                }

                //On converti en string lowercase
                var stringValue = angular.lowercase('' + fieldValue);

                //On cherche le filtre dans la valeur
                if(stringValue.indexOf(lowerFilter) !== -1) {
                    outArray.push(input[elemId]);
                    //Si on l'a trouvé une fois, on peut passer à l'élément de tableau suivant
                    break;
                }
            }
        }
        return outArray;
    }

}
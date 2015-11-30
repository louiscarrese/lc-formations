function myCustomFilter() {
    return function(input, filter) {
        var outArray = [];
        var lowerFilter = angular.lowercase(filter) || '';

        //Pour chaque élément du tableau
        for(elemId = 0; elemId < input.length; elemId++) {
            //Pour chaque champ à analyser
            for(fieldId = 2; fieldId < arguments.length; fieldId++) {
                var stringValue = angular.lowercase('' + input[elemId][arguments[fieldId]]);

                if(stringValue.indexOf(lowerFilter) !== -1) {
                    outArray.push(input[elemId]);
                    break;
                }
            }
        }
        return outArray;

    }

}
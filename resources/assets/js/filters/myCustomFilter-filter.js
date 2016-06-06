function myCustomFilter() {
    /**
     * path: the remaining path to explore
     * value: the current value
     * filter: the filter to check against
     */
    function check(path, value, filter) {
        //If there is no value to check, we get out
        if(value != undefined) {
            //If we've reached the end of the path 
            if(path != undefined && path.length == 0) {
                //We check the value
                return (angular.lowercase('' + value).indexOf(filter) !== -1);
            } else {
                //We pop one from the path
                var nextValue = value[path[0]];
                path.splice(0,1);
                //If we are dealing with an array, we have to iterate
                if(Array.isArray(nextValue)) {
                    for(var i = 0; i < nextValue.length; i++) {
                        //When we have found something, we return immediately
                        if(check(path, nextValue[i], filter))
                            return true;
                    }
                    //We found nothing
                    return false;
                } else {
                    //It's a simple value, recurse
                    return check(path, nextValue, filter);
                }
            }
        } else {
            return false;
        }

    }

    /**
     * input : an array of objects to filter.
     * filter : a string to be searched in the inputs properties. Will be splitted on " "
     */
    return function(input, filter) {
        //Let's not deal with an empty filter or an empty input
        if(filter == undefined || filter == null || filter  === '' || input == undefined || input == null || input.length == 0)
            return input;

        //The array we will return
        var outArray = [];

        //Process the filter
        var lowerFilter = angular.lowercase(filter) || '';
        var filters = lowerFilter.split(' ');

        //Make sure we have properties to search in, if not use all the properties
        var searchedProps = [];
        if(arguments.length > 2) {
            for(var i = 2; i < arguments.length; i++) {
                searchedProps.push(arguments[i]);
            }
        } else {
            for(var prop in input[0]) {
                if(input[0].hasOwnProperty(prop))
                    searchedProps.push(prop);
            }
        }

        //Pour chaque élément du tableau
        for(elemId = 0; elemId < input.length; elemId++) {
            //Pour chaque champ à analyser
            for(fieldId = 0; fieldId < searchedProps.length; fieldId++) {

                //On découpe, au cas où ça serait un sous objet (genre objet.propriete)
                var fieldPath = searchedProps[fieldId].split('.');

                var found = false;
                for(filterId = 0; filterId < filters.length && !found; filterId++) {
                    found = check(fieldPath, input[elemId], filters[filterId]);
                }

//                var found = check(fieldPath, input[elemId], lowerFilter);

                if(found) {
                    outArray.push(input[elemId]);
                    break;
                }

            }
        }
        return outArray;
    }
}

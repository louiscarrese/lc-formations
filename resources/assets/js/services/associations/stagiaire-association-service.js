function stagiaireAssociationService() {
    return {
        searchMatchDisplayed: function(item, searchString) {
            if(item && (item.nom || item.prenom) ) {    
                return item.nom + ' ' + item.prenom;
            } else { 
                return searchString;
            }
        },

        searchChoicesDisplayed: function(item) {
            if(item != undefined) 
                return item.nom + ' ' + item.prenom;
            else 
                return '';
        },

        dbData: function(data, searchResult) {
            if(data.stagiaire != null) {
                return data.stagiaire;
            } else {
                return searchResult;
            }
        },


        associate: function(data, searchResult) {
            console.log('service associate');
            console.log(data);
            console.log(searchResult);
            if(searchResult != null) {
                data.stagiaire_id = searchResult.id;
                data.stagiaire = searchResult;
            }
        },

        mergeData: function(key, data) {
            data.stagiaire[key] = data[key];
        }
    }

}
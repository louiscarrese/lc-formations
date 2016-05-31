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
    }

}
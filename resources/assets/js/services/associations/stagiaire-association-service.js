function stagiaireAssociationService() {
    return {
        searchMatchDisplayed: function(item) {
            if(item != undefined) 
                return item.nom + ' ' + item.prenom;
            else 
                return '';
        },

        searchChoicesDisplayed: function(item) {
            if(item != undefined) 
                return item.nom + ' ' + item.prenom;
            else 
                return '';
        },
    }

}
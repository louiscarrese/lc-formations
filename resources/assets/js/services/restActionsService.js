function restActionsServiceFactory() {
    return {
        get: function(resource) {
            echo 'get !';
        };
        update: function(resource) {
            echo 'update !';
        };
    };

}
function editModeServiceFactory($location) {
    return {
        initFromUrl: function(service) {
            var ret = {};

            ret.mode = this.getModeFromUrl();
            ret.editing = false;

            if(ret.mode === 'create') {
                ret.data = this.getDataFromUrl();
                ret.editing = true;
            } else {
                var id = this.getId();
                service.get({id:id}, function(value, responseHeaders) {
                    ret.data = value;
                });
                if(ret.mode === 'edit') {
                    ret.editing = true;
                }
            }

            return ret;
        },

        getModeFromUrl: function() {
            if($location.path().substr(-'create'.length) === 'create') {
                return 'create';
            } else {
                var params = $location.search();
                if(params.hasOwnProperty('edit') && params.edit === 'true') {
                    return 'edit';
                } else {
                    return 'read';
                }
            }
        },

        getDataFromUrl: function () {
            return $location.search();
        },

        getId: function() {
            var path = $location.path();
            var pathComponents = path.split('/');

            var id = pathComponents[pathComponents.length - 1];

            return id;
        }

    };
}
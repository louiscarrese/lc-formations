function staticDataFactory($filter, $q) {
    var self = this;
    return {
        data: [],

        label: function(id, precisions) {
            var ret = null;

            if(id) {
                var foundArray = $filter('filter')(this.data, {id: id}, true)

                if(foundArray.length < this.data.length && foundArray.length > 0) {
                    var found = foundArray[0];

                    if(found.precision && precisions && precisions[found.id]) {
                        ret = found.label + ' (' + precisions[found.id] + ')';
                    } else {
                        ret = found.label;
                    }

                }
            }

            return ret;
        },
        promise: function() {
            return $q.when(this.data);
        }
    }
}
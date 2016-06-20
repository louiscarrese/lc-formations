function mySortableHeaderDirective() {
    return {
        restrict: 'A',
        transclude: true,
        scope: {
            order: '=',
            by: '=',
            reverse: '=',
        },
        template: function() {
            var template = '';

            template += '<span ng-click="onClick()" ng-transclude></span>';
            template += '<span class="glyphicon sort-arrow" ng-class="{\'glyphicon-triangle-top\' : order === by && !reverse,  \'glyphicon-triangle-bottom\' : order===by && reverse}"></span>';
            return template;
        },
        link: function(scope, element, attrs) {
            if(attrs["defaultSort"] != undefined) {
                scope.by = scope.order;
                scope.reverse = false;
            }
            scope.onClick = function () {
                if(scope.order === scope.by) {
                   scope.reverse = !scope.reverse 
                } else {
                  scope.by = scope.order ;
                  scope.reverse = false; 
                }
            }
        }
    };
}
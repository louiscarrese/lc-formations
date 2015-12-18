function mySortableHeaderDirective() {
    return {
        restrict: 'E',
        transclude: true,
        scope: {
            setSort: '&set',
            getSort: '&get'
        },
        template: function() {
            var template = '';

            template += '<span ng-click="setSort()" ng-transclude></span>';
            template += '<span ng-show="getSort() === false" class="sort-arrow glyphicon glyphicon-triangle-top"></span>';
            template += '<span ng-show="getSort() === true" class="sort-arrow glyphicon glyphicon-triangle-bottom"></span>';

            return template;
        }
    };
}
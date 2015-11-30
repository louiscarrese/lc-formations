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
            template += '<div ng-click="setSort()" ng-show="getSort() === false" class="sort-up"></div>';
            template += '<div ng-click="setSort()" ng-show="getSort() === true" class="sort-down"></div>';

            return template;
        }
    };
}
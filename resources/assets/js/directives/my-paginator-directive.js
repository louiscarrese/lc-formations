function myPaginator() {
    function buildPaginator(paginator, scope, elem) {
        elem.empty();

        var mainDiv = angular.element('<div></div>')
            .addClass('paginator');
        elem.append(mainDiv);

        if(paginator.last_page > 1) {

            var prevBtn = angular.element('<button>&lt;</button>')
                .addClass('btn btn-default')
                .on('click', scope.prevPage);
            if(paginator.prev_page_url == null) {
                prevBtn.addClass('disabled');
            }

            mainDiv.append(prevBtn);

            for(var i = 1; i <= paginator.last_page; i++) {                
                var pageBtn = angular.element('<button>' + i + '</button>')
                    .addClass('btn btn-default')
                    .data('pageNum', i)
                    .on('click', function() {
                        scope.gotoPage()(angular.element(this).data('pageNum'))
                    });
                if(paginator.current_page == i) {
                    pageBtn.addClass('disabled');
                }                
                mainDiv.append(pageBtn);
            }

            var nextBtn = angular.element('<button>&gt;</button>')
                .addClass('btn btn-default')
                .on('click', scope.nextPage);
            if(paginator.next_page_url == null) {
                nextBtn.addClass('disabled');
            }
            mainDiv.append(nextBtn);

        }
    }

    var directive = {
        restrict: 'E', 
        scope: {
            paginator: '=',
            gotoPage: '&'
        },
        controller: ['$scope', function($scope) {

            $scope.nextPage = function () {
                $scope.gotoPage()($scope.paginator.current_page + 1);
            }

            $scope.prevPage = function () {
                $scope.gotoPage()($scope.paginator.current_page - 1);
            };

        }],

        link: function(scope, elem, attrs) {
            scope.$watch('paginator', function(newValue, oldValue) {
                if(newValue !== oldValue) {
                    buildPaginator(newValue, scope, elem);
                }
            }, true);
        }

    }

    return directive;
}
/**
 * Created by Ja on 2016-10-05.
 */
app.controller('MainController', ['$scope', function($scope) {
    $scope.title = 'Top Sellers in Books';
    $http.get(window.location.href + "php/get.php")
        .then(function (response) {$scope.names = response.data.records;});
}]);
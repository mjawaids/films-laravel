var app = angular.module('codelineFilms', []);

app.controller('FilmController', function($scope, $http) {

    /**
     * Get the films data
     */
    getFilms = function(page) {
        $http.get('/getfilms?page=' + page).then(
            function(films) {
                $scope.films = films.data;
            }
        );
    }

    prev = function() {
        if($scope.films.current_page > 1)
            getFilms($scope.films.current_page - 1);
    }

    next = function() {
        if($scope.films.current_page < 5)
            getFilms($scope.films.current_page + 1);
    }

    /******************************************************************************** */
    
    // get all the films
    getFilms(1);
});

angular.module('app.controllers')
	.controller('PostNovoController',
	['$scope', '$location', 'Post', function($scope, $location, Post) {
		$scope.post = new Post();

		$scope.save = function() { 
			if ($scope.form.$valid) {
				$scope.post.$save().then(function() { 
					$location.path('/posts');
				});
			}
		}
	}]);
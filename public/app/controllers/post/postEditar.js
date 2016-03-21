angular.module('app.controllers')
	.controller('PostEditarController',
	['$scope', '$location', '$routeParams', 'Post', 
	function($scope, $location, $routeParams, Post) {
		$scope.post = Post.get({id: $routeParams.id});

		$scope.save = function() { 
			if ($scope.form.$valid) {
				Post.update({id: $scope.post.id, $scope.post, function() {
					$location.path('/posts');
				});
			}
		}
	}]);
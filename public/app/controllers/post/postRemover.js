angular.module('app.controllers')
	.controller('PostRemoverController',
	['$scope', '$location', '$routeParams', 'Post', 
	function($scope, $location, $routeParams, Post) {
		$scope.post = Post.get({id: $routeParams.id});

		$scope.remove = function() { 
			$scope.Post.$delete().then( function() {
				$location.path('/posts');
			});
		}
	}]);
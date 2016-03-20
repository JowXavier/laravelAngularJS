angular.module('app.controllers')
	.controller('PostListController', ['$scope', 'Post' ,function($scope, Post) {
		$scope.posts = Post.query();
	}]);
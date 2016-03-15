angular.module('app.controllers')
	.controller('LoginController', ['$scope','$location', function($scope, $location) {
		$scope.user = {
			username: '',
			password: ''		
		};

		$scope.login = function() {
			OAuth.getAccessToken($scope.user).then(function() {
				$location.path('home');
			},function() {
				alert('Login Inválido');
			});
		};
	}]);
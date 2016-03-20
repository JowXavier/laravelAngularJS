angular.module('app.services')
	.service('Post', ['$resource', 'appConfig', function($resource, appConfig) {
		return $resource(appConfig.baseUrl + '/posts/:id', {id: '@id'});
	}]);
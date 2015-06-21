angular.module('Josefin')
	.factory('post', ['$http', function PostFactory($http) {
		"use strict";
		return {
			work: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/posts/?filter[cat]=18'});
			},
			media: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/media/'});
			},
			exhibition: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/posts/?filter[cat]=8'});
			},
		};
	}]);
	
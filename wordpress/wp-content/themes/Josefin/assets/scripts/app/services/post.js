angular.module('Josefin')
	.factory('post', ['$http', function PostFactory($http) {
		"use strict";
		return {
			work: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/posts?filter[cat]=18&filter[posts_per_page]=999'});
			},
			contact: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/posts?filter[cat]=24&filter[posts_per_page]=999'});
			},
			categories: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/taxonomies/category/terms/'});
			},
			exhibition: function($routeParams) {
				return $http({method: 'GET', url: 'wp-json/posts/?filter[cat]=19&filter[posts_per_page]=999'});
			},
			slides: function($routeParams) {
				return $http({method: 'GET', url: 'http://www.qcumber.no/Josefin/wordpress/wp-json/posts/?filter[cat]=39&filter[posts_per_page]=999'});
			},
			
		};
	}]);
	
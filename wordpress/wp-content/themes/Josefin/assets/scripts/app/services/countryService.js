angular.module('Josefin')
	.factory('countryFactory', ['$http', function countryFactory($http){
    	"use strict";
		function allCountries() {
			return $http.get('https://restcountries.eu/rest/v1/all');
		}
		
		return {
			allCountries: allCountries
		};    
	}]);
angular.module('Josefin')
	.controller('instagramCtrl', ['$scope', 'instagramService', function($scope, instagramService) {
	 	"use strict";
		
		$scope.pics = [];
		
		instagramService.fetchRecent(function(data){
			$scope.pics = data;
			console.log(data);	
		});
	}]);
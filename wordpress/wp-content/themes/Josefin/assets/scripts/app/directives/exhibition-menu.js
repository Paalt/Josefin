angular.module('Josefin')
	.directive('exhibitionMenu', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			scope: {
				activeExhibition: "="
			},
			templateUrl: SiteURL + "directives/exhibition-menu.php",
			link: function(scope){
	
				post.categories().success(function(res){
					scope.exhibitions = res;
				});	
				
				scope.setActiveExhibition = function(exh){
					scope.activeExhibition = exh;
				};
			}	
		};
	}]);
angular.module('Josefin')
	.directive('workCategoriesFilter', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			scope: {
				category: "="
			},
			templateUrl: SiteURL + "directives/work-categories-filter.php",
			link: function(scope){
	
				post.categories().success(function(res){
					scope.categories = res;
				});	
				
				scope.setCategory = function(cat){
					scope.category = cat;	
				};

			}	
		};
	}]);
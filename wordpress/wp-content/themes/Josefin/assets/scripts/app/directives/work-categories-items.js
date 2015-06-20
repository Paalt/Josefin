angular.module('Josefin')
	.directive('work	CategoriesItems', ['SiteURL', function(SiteURL) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			require: "^workCategories",
			scope: {
				post: "=",
			},
			templateUrl: SiteURL + "directives/work-categories-items.php",
			link: ['scope', 'workCategoriesCtrl', function(scope, workCategoriesCtrl){
				scope.expand = function(){
					workCategoriesCtrl.expand();
				};
				
				scope.setPost = function(){
					workCategoriesCtrl.setActivePost(scope.post);	
				};
			}]	
		};
	}]);
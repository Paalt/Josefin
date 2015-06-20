angular.module('Josefin')
	.directive('work-categories-filter', ['SiteURL', function(SiteURL) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			require: "^workCategories",
			scope: {
				post: "=",
			},
			templateUrl: SiteURL + "directives/bs-posts-list.php",
			link: ['scope', 'workCategoriesCtrl', function(scope, workCategoriesCtrl){
				
				scope.expand = function(){
					if (workCategoriesCtrl.getExpansionStatus() === true) {
						workCategoriesCtrl.expand();
						}
					workCategoriesCtrl.expand();
				};
				
				scope.setPost = function(){
					workCategoriesCtrl.setActivePost(scope.post);	
				};

			}]	
		};
	}]);
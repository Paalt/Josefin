angular.module('Josefin')
	.directive('workCategoriesFilter', ['SiteURL', function(SiteURL) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			require: "^workCategories",
			scope: {
				post: "=",
			},
			templateUrl: SiteURL + "directives/bs-posts-list.php",
			link: function(scope, workCategoriesCtrl){
				
				scope.expand = function(){
					if (workCategoriesCtrl.getExpansionStatus() === true) {
						workCategoriesCtrl.expand();
						}
					workCategoriesCtrl.expand();
				};
				
				scope.setPost = function(){
					workCategoriesCtrl.setActivePost(scope.post);	
				};

			}	
		};
	}]);
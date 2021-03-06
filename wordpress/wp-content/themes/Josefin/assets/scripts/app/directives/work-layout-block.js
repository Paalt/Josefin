angular.module('Josefin')
	.directive('workLayoutBlock', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			require: "^workCategories",
			scope: {
				iterate: "@",
				category: "="
			},
			templateUrl: SiteURL + "directives/work-layout-block.php",
			link: function(scope, element, attr, workCategoriesCtrl){
				
				scope.byBlock = workCategoriesCtrl.incrementByOne();
				scope.byPostLargeMedium = workCategoriesCtrl.incrementByTwo();
				scope.byPostSmall = workCategoriesCtrl.incrementByFour();
				scope.active = workCategoriesCtrl.active();
				
				if(scope.active === 'works') {
					post.work().success(function(res){
						scope.posts = res;
					});	
				} else if (scope.active === 'exhibition') {
					post.exhibition().success(function(res){
						scope.posts = res;
					});	
				}
			}	
		};
	}]);
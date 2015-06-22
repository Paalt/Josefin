angular.module('Josefin')
	.directive('workLayoutBlock', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			require: "^workCategories",
			scope: {
				post: "=",
				iterate: "@"
			},
			templateUrl: SiteURL + "directives/work-layout-block.php",
			link: function(scope, element, attr, workCategoriesCtrl){
				
				scope.byBlock = workCategoriesCtrl.incrementByOne();
				scope.byPostLargeMedium = workCategoriesCtrl.incrementByTwo();
				scope.byPostSmall = workCategoriesCtrl.incrementByFour();
				
				post.work().success(function(res){
					scope.posts = res;
				});	
				
				scope.expand = function(){
					workCategoriesCtrl.expand();
				};
				
				scope.setPost = function(){
					workCategoriesCtrl.setActivePost(scope.post);	
				};
			}	
		};
	}]);
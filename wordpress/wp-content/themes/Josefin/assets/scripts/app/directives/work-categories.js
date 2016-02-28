angular.module('Josefin')
	.directive('workCategories', ['post', 'SiteURL', function(post, SiteURL) {
	"use strict";
		return {
			restrict: 'E',
			templateUrl: SiteURL + 'directives/work-categories.php',
			scope: {
				page: '@'
			},
			controller: function($scope){
				/*
				//Create incremental helper functions for the works display system
				//For every 8 posts a new layout block is added to the DOM.
				
				//Find the current layout block and disable queries thats not in the block
				$scope.byBlock = -1;
				this.incrementByOne = function() {
					$scope.byBlock += 1;
					return $scope.byBlock;
				};
				
				//Find the current post to render
				//Incremental value is ofsset by 1, so that every second picture is rendered at top and bottom
				$scope.byPostLargeMedium = -2;
				this.incrementByTwo = function() {
					$scope.byPostLargeMedium += 2;
					return $scope.byPostLargeMedium;
				};
				
				//Create the same helpers for small posts
				$scope.byPostSmall = -4;
				this.incrementByFour = function() {
					$scope.byPostSmall += 4;
					return $scope.byPostSmall;
				};
				
				this.active = function () {
					return $scope.page;
				};*/
			},
			link: function(scope) {
				
				scope.x = 0.00;
				
				post.work().success(function(res){
					console.log(res);
					scope.posts = res;
					
					//Get the number of posts
					angular.forEach(res, function() {
					   scope.x += 1;
					});
					
					scope.x = scope.x;
				});
				/*
				scope.r = 0.00;
				scope.x = 0.00;
				var r = 0.00;
				//A layout can store 16 images. 1 post makes 1 image. 
				var l = 8.00;
				
				//Get all posts labled work and calculate number of layouts to render
				if(scope.page === 'works') {
					post.work().success(function(res){
						scope.posts = res;
						
						//Get the number of posts
						angular.forEach(res, function() {
						   scope.x += 1;
						});
						
						scope.x = scope.x;
						scope.calculation(scope.x);	
					});
					
				} else if (scope.page === 'exhibition') {
					post.exhibition().success(function(res){
						scope.posts = res;
						
						//Get the number of posts
						angular.forEach(res, function() {
						   scope.x += 1;
						});
						
						scope.x = scope.x;
						scope.calculation(scope.x);	
					});
				}
				
				//Function to calculate the number of layoutblocks to render
				scope.calculation = function(num){
					scope.x = num;
					scope.x = scope.x;	
					scope.r = scope.x/l; 
					
					scope.r.toFixed(2);
					//Check if number is whole
					var hasDecimals = scope.r % 1;
					//If not then round up to nearest whole number, even when rounding down.
					if (hasDecimals !== 0) {
						r = scope.r;
						r = Math.round(scope.r);
						//Rounding down
						if(r < scope.r) {
							scope.r = Math.round(scope.r) + 1;
						//Rounding up
						} else if (r > scope.r) {
							scope.r = Math.round(scope.r);
						//Not rounding
						} else {
							scope.r = Math.round(scope.r);
						}
					//Number is whole
					} else if (hasDecimals !== 0) {
						scope.r = Math.round(scope.r);
					}
					return scope.r;
					
				};
	
				//Render the layoutblocks
				scope.createLayoutBlock = function(n) {		
					return new Array(n);	
				};
				*/
			}	
		};
	}]);
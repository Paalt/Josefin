angular.module('Josefin')
	.directive('workCategories', ['post', '$sce', 'SiteURL', function(post, $sce, SiteURL) {
	"use strict";	
	  return {
		restrict: 'E',
		replace: true,
		scope: {
				expanded: '@'	
			},
		templateUrl: SiteURL + 'directives/work-categories.php',
		controller: function($scope){
				
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
			
				this.setActivePost = function(post){
					$scope.activePost = post.ID;
				};

				$scope.expanded = false;
				
				this.expand = function(){
					$scope.expanded = !$scope.expanded;	
				};
				
				this.getExpansionStatus = function(){
					return $scope.expanded;	
				};
				
			},
			link: function(scope){
				scope.r = 0.00;
				scope.x = 0.00;
				var r = 0.00;
				//A layout can store 16 images. 1 post makes 1 image. 
				var l = 8.00;
				
				//Get all posts labled work and calculate number of layouts to generate
				post.work().success(function(res){
					scope.posts = res;
					
					//Get the number of posts
					angular.forEach(res, function() {
					   scope.x += 1;
					});
					
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
				});
	
				scope.createLayoutBlock = function(n) {		
					return new Array(n);	
				};
				
				scope.posts = $sce.trustAsHtml(scope.posts);	
			}	
		};
	}]);
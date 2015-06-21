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
		controller: ['$scope', function($scope){
			
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
				
			}],
			link: ['scope', function(scope){
				
				post.news().success(function(res){
					scope.posts = res;
					console.log(scope.posts);
				});
				
				scope.posts = $sce.trustAsHtml(scope.posts);	
			}]	
		};
	}]);
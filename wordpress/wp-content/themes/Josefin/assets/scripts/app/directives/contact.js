angular.module('Josefin')
	.directive('contact', ['SiteURL', 'post', '$sce', function(SiteURL, post, $sce) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			scope: {
				isolate: "@",
			},
			templateUrl: SiteURL + "directives/contact.php",
			link: function(scope){
					
				post.contact().success(function(res){
					scope.posts = res;
				});	
				
				scope.posts = $sce.trustAsHtml(scope.posts);	
			}	
		};
	}]);
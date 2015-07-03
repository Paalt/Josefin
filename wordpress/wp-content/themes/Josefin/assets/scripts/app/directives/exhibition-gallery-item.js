angular.module('Josefin')
	.directive('onFinishRender', function () {
		"use strict";
		return {
			restrict: 'A',
			link: function (scope, element, attr) {
				if (scope.$last === true) {
					scope.$evalAsync(attr.onFinishRender);
				}
			}
    	};
	})
	.directive('exhibitionGalleryItem', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			scope: {
				activeExhibition: "="
			},
			templateUrl: SiteURL + "directives/exhibition-gallery-item.php",
			link: function(scope){
				var h = window.innerHeight;
				var mySwiper = new Swiper ('.swiper-container', {
					// Optional parameters
					direction: 'vertical',
					freeModeMomentum: true,
					freeModeMomentumRatio: 1,
					speed: 1000,
					mousewheelControl: true,
					paginationHide: true,
					// Navigation arrows
					nextButton: '.carousel-button-next',
					prevButton: '.carousel-button-prev',
					loop: false,
					height: h,
					
					// If we need pagination
					pagination: '.swiper-pagination',
					
					paginationBulletRender: function (index, className) {
					  return '<span class="' + className + '">' + (index + 1) + '</span>';
					}
					});   
					
				post.exhibition().success(function(res){
					scope.posts = res;
				});
				
				scope.swiperInit = function() {
					mySwiper.update(true);
				};
				
			}	
		};
	}]);
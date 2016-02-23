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
	.directive('slides', ['SiteURL', 'post', function(SiteURL, post) {
		"use strict";
		return {
			replace: true,
			restrict: "E",
			scope: {
				activeExhibition: "="
			},
			templateUrl: SiteURL + "directives/slides.php",
			link: function(scope){
				var h = window.innerHeight;
				var mySwiper = new Swiper ('.swiper-container', {
					// Optional parameters
					direction: 'horizontal',
					loop: true,
					slidesPerView: 1,
					keyboardControl: true,
					grabCursor: true,
					resistance: false,
					speed: 1000,
					mousewheelControl: true,
					paginationHide: true,
					height: h,
					
					// If we need pagination
					pagination: '.swiper-pagination',
					
					paginationBulletRender: function (index, className) {
					  return '<span class="' + className + '">' + (index + 1) + '</span>';
					}
				});   
					
				post.slides().success(function(res){
					scope.posts = res;
				});
				
				scope.swiperInit = function() {
					mySwiper.update(true);
				};
				
			}	
		};
	}]);
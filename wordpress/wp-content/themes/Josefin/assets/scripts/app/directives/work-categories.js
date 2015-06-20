angular.module('Josefin')
	.directive('workCategories', function() {
	  return {
		restrict: 'E',
		replace: true,
		scope: {},
		templateUrl: 'directives/work-categories.php',
		link: function (scope) {
		  scope.name = 'something';
		}
	  };
	});
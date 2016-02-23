angular.module('Josefin')
	.controller('mainMenuCtrl', ['$scope', '$timeout', function($scope, $timeout) {
	 	"use strict";

		$scope.toggleMenu = true;	
		var toggling;
		var i = 0;
		
		this.menu = function() {
			//Check if instance of toggling animation is already running. If it is return(exit).
			if ( angular.isDefined(toggling) )
			{ 
				return;
			}
			
			//If this is the first mouseover we want a quick response, and reveal the menu quickly.
			if (i === 0) {
				toggling = $timeout(function() {
					//Hide/Show the menu
					$scope.toggleMenu =! $scope.toggleMenu;
					//Itereate to tell the first mousevent has been released.
					i++;
					//Animation is complete, reset the state of toggling, allowing new animation to occur.
					$scope.stopToggling();
				}, 100);
			}
			
			//After showing the menu for the first time, delay the show/hide event by 1 second to stop animation stuttering. 
			if (i > 0) {
				toggling = $timeout(function() {
					$scope.toggleMenu =! $scope.toggleMenu;
					console.log("rude");
					$scope.stopToggling();
				}, 1000);	
			}
		};
		
		//reset the toggling state, allowing new animation/timeout function to play again.
		$scope.stopToggling = function() {
          if (angular.isDefined(toggling)) {
            $timeout.cancel(toggling);
            toggling = undefined;
          }
        };
	}]);
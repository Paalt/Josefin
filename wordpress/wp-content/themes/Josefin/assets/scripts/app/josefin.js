angular.module('Josefin', ['ngAnimate', 'ngAria', 'ngMaterial', 'ngSanitize', 'ngResource', 'formly'])
	.run(function(formlyConfig) {
		'use strict';
		formlyConfig.setType({
		  name: 'submit',
		  templateUrl: 'submit.html'
		});
	  });

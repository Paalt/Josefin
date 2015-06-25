angular.module('Josefin')
	.factory('instagramService', function($resource){
		"use strict";
		return {
			fetchRecent: function(callback){
				
				var api = $resource('https://api.instagram.com/v1/users/284246638/media/recent?count=20&client_id=:client_id&callback=JSON_CALLBACK',{
					client_id: '87a859b01c09482da08ab1c77d7b6254'
				},{
					// This creates an action which we've chosen to name "fetch". It issues
					// an JSONP request to the URL of the resource. JSONP requires that the
					// callback=JSON_CALLBACK part is added to the URL.
	
					fetch:{method:'JSONP'}
				});
	
				api.fetch(function(response){
					callback(response.data);
				});
			}
		};
	
	});
	
angular.module('Josefin', ['ngAnimate', 'ngAria', 'ngMaterial', 'ngSanitize', 'ngResource', 'formly', 'ngMessages', 'ngFileUpload', 'ui.bootstrap'])
	
	.run(function(formlyConfig, formlyValidationMessages, SiteURL) {
	'use strict';

	formlyConfig.setType([
		{
			name: 'text',
			templateUrl: SiteURL + '/formly/types/text.html',
			defaultOptions: {
				templateOptions: {
					minlength: 3,
					maxlength: 50,
					required: true	
				},
				validators: {
					alphaNumeric: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							if(value) {
								return validateAlphaNumeric(value);
							}
						},
						message: function($viewValue, $modelValue, scope) {
							return $viewValue + " is not a valid " + scope.to.label + ". Please use only letters and numbers";
						}
				   }
				}
			}
		},
		{
			name: 'number',
			templateUrl: SiteURL + '/formly/types/number.html',
			defaultOptions: {
				ngModelAttrs: {
					steps: {
						attribute: 'steps'
					}
				},
				templateOptions: {
					steps: 1
				},
				validators: {
					number: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							if (isNaN(value)) {
								return false;
							} else {
								return true;
							}
						},
						message: '$viewValue + " is not a valid number. Please use numbers only"'
					}
				} 
			}
		},
		{
			name: 'email',
			templateUrl: SiteURL + '/formly/types/email.html',
			defaultOptions: {
				templateOptions: {
					minlength: 3,
					maxlength: 50,
					required: true,
					placeholder: 'email@domain.com'	,
					label: 'E-mail'
				},
				validators: {
					email: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							if(value) {
								return validateEmail(value);
							}
						},
						message: '$viewValue + " is not a valid emailadress. Please check your spelling"'
				   }
				} 
			}
		},
		{
			name: 'textarea',
			templateUrl: SiteURL + '/formly/types/textfield.html',
			defaultOptions: {
				ngModelAttrs: {
					rows: {
						attribute: 'rows'
					},
					cols: {
						attribute: 'cols'
					}
				},
				templateOptions: {
					minlength: 10,
					maxlength: 2000,
					required: true
				},
				validators: {
					textarea: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							if(value) {
								return validateTextArea(value);
							}
						},
						message: 'You have used some invalid characters. Characters allowed is .  _ - ?  $ ! " , : € # & %   (  ) = + @ * ; and backlash'
				   }
				} 
			}
		},
		{
			name: 'datepicker',
			templateUrl: SiteURL + '/formly/types/datepicker.html',
			defaultOptions: {
				templateOptions: {
					required: true	
				}
			}
		},
		{
			name: 'checkbox',
			templateUrl: SiteURL + '/formly/types/checkbox.html'
		},
		{
			name: 'select',
			templateUrl: SiteURL + '/formly/types/select.html',
			defaultOptions: {
				templateOptions: {
					required: true,
				}
			}
		},
		{
			name: 'radioNav',
			templateUrl: SiteURL + '/formly/types/radio.html'
		},
		{
			name: 'radioBtn',
			templateUrl: SiteURL + '/formly/types/radiobtn.html'
		},
		{
			name: 'file',
			templateUrl: SiteURL + '/formly/types/file.html',
			
		},
		{
			name: 'hidden',
			templateUrl: SiteURL + '/formly/types/hidden.html',
			
		},
		{
			name: 'url',
			templateUrl: SiteURL + '/formly/types/text.html',
			defaultOptions: {
				templateOptions: {
					required: true	
				},
				validators: {
					alphaNumeric: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							if(value) {
								return validateUrl(value);
							}
						},
						message: function($viewValue) {
							return $viewValue + " is not a valid url. domain.com or www.domain.com or http://www.domain.com are valid";
						}
				   }
				}
			}
		},
		{
		  name: 'autocomplete',
		  templateUrl: SiteURL + '/formly/types/autocomplete.html',
		},
		{
			name: 'phoneNumber',
			extends: 'number',
			defaultOptions: {
				templateOptions: {
					minlength: 8,
					maxlength: 10,	
					required: true,
					placeholder: 40404040,
					label: 'Phone nr:'
				}
			}
		},
		{
			name: 'digit',
			extends: 'number',
			defaultOptions: {
				templateOptions: {
					required: true,
				},
				className: 'digit'
			}
		},
		{
			name: 'birthdate',
			extends: 'datepicker',
			defaultOptions: {
				validators: {
					age: {
						expression: function($viewValue, $modelValue) {
							var value = $modelValue || $viewValue;
							var currentDate = new Date();
							//Check if user is older thatn 18 years old.
							var ageCheck = currentDate.setDate(currentDate.getDate()-6574);
							var comparator = new Date(ageCheck);
							var y = new Date(value);
							if(y > comparator) {
								return false;
							} else {
								return true;
							}
						},
						message: '"Sorry, you have to be older than 18 years to apply."'
					}
				}
			}
		},
	]);
	
	formlyConfig.setWrapper([
		{
			name: 'inputLabel',
			templateUrl: SiteURL + '/formly/wrappers/inputLabel.html',
			types: ['text', 'personalia', 'number', 'phoneNumber', 'digit', 'email', 'textarea', 'datepicker', 'birthdate', 'select', 'file', 'radioBtn', 'url']
		},
		{
			name: 'hasError',
			templateUrl: SiteURL + '/formly/wrappers/hasError.html',
			types: ['text', 'personalia', 'number', 'phoneNumber', 'digit', 'email', 'textarea', 'datepicker', 'birthdate', 'select', 'file', 'radioBtn', 'url', 'autocomplete']
		},
		{
			name: 'inputLabelColumn',
			templateUrl: SiteURL + '/formly/wrappers/inputLabelColumn.html',
			types: ['autocomplete']
		},
	]);
	
	formlyConfig.extras.ngModelAttrsManipulatorPreferBound = true;
	
	formlyValidationMessages.addTemplateOptionValueMessage('maxlength', 'maxlength', '', 'is the maximum length', 'Too long');
	formlyValidationMessages.addTemplateOptionValueMessage('minlength', 'minlength', '', 'is the minimum length', 'Too short');
	formlyValidationMessages.addStringMessage('required', 'This field is required');
	
	function validateAlphaNumeric(value) {
        return /^[æøå\w\s]+$/i.test(value);
    }
	
	function validateEmail(value) {
		return /^([æøå\w\._-]+)(@)([æøå\w-]+\.)([æøå\w]{2,6}$)/i.test(value);
	}
	
	function validateTextArea(value) {
		return /[æøå\w\._\-\?\$!",:€#&%\/\(\)=+@*;]+/igm.test(value);
	}
	
	function validateUrl(value) {
		return /(http|https)?(:\/\/)?(www\.)?([æøå\w]+\.)([æøå\w]{2,6}$)/i.test(value);
	}
});

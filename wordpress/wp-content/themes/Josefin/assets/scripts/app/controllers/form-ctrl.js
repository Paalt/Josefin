angular.module('Josefin')
	.constant('broker', ['Megler1', 'megler2', 'Megler3'])
	.controller('formController', ['$scope', '$http', 'broker', 'Upload', function formCtrl($scope, $http, broker, Upload){	
		"use strict";
		var vm = this;
		
		vm.options = {
			formState: {
				activeForm: 1,
				activeRadio: 1,
				fileLoaded: false
			}
		};
		
		vm.model = {
			chooseForm: 1,
			choosePositionApplication: 'Stylist'
		};
		
		vm.data = {cv: ''};
		
		vm.fields = [
			{
				fieldGroup: [
					{
						key: 'chooseForm',
						type: 'radioNav',
						templateOptions: {
							label: 'Choose form',
							onClick: function ($viewValue, $modelValue, scope) {
								scope.formState.activeForm = $viewValue;
							},
							options: [
								{
									key: 'collaboration',
									name: 'Collaboration',
									value: 1	
								},
								{
									key: 'workApplication',
									name: 'Work Application',
									value: 2	
								},
								{
									key: 'booking',
									name: 'Booking',
									value: 3	
								}		
							]
						},
						className: 'radio-nav'	
					}
				]
			},
			{
				fieldGroup: [
					{
						key: 'nameCollaboration',
						type: 'text',
						templateOptions: {
							label: 'Name',
							placeholder: 'Firstname Surname'
						},
						hideExpression: 'model.chooseForm != 1',
					},
					{
						key: 'titleCollaboration',
						type: 'text',
						templateOptions: {
							placeholder: 'Title',
							label: 'Title',
							required: false,
						},
						hideExpression: 'model.chooseForm != 1',
					},
					{
						key: 'phoneCollaboration',
						type: 'phoneNumber',
						hideExpression: 'model.chooseForm != 1',
					},
					{
						key: 'emailCollaboration',
						type: 'email',
						hideExpression: 'model.chooseForm != 1',
					},
					{
						key: 'companyCollaboration',
						type: 'text',
						templateOptions: {
							placeholder: 'MyCompany AS',
							label: 'Company',
						},
						hideExpression: 'model.chooseForm != 1',
					},
					{
						key: 'projectDescriptionCollaboration',
						type: 'textarea',
						templateOptions: {
							placeholder: 'Details about my project',
							label: 'Project Description',
							rows: 15
						},
						hideExpression: 'model.chooseForm != 1'
					},
					{
						key: 'timeFrameCollaboration',
						type: 'digit',
						templateOptions: {
							label: 'Timeframe',
							required: false,
						},
						data: {
							denomination: ' weeks'
						},
						hideExpression: 'model.chooseForm != 1'
					},
					{
						key: 'costEstimateCollaboration',
						type: 'digit',
						templateOptions: {
							label: 'Cost estimate',
							required: false,
						},
						data: {
							denomination: ' NOK(in 1000)'
						},
						hideExpression: 'model.chooseForm != 1'
					}
				],
			},
			{
				fieldGroup: [
					{
						key: 'firstNameApplication',
						type: 'text',
						templateOptions: {
							label: 'First name',
							placeholder: 'First name'
						},
						hideExpression: 'model.chooseForm != 2',
					},
					{
						key: 'lastNameApplication',
						type: 'text',
						templateOptions: {
							label: 'Last name',
							placeholder: 'Last name'
						},
						hideExpression: 'model.chooseForm != 2',
						
					},
					{
						key: 'birthApplication',
						type: 'birthdate',
						templateOptions: {
							label: 'Date of birth'
						},
						hideExpression: 'model.chooseForm != 2',
						
					},
					{
						key: 'phoneApplication',
						type: 'phoneNumber',
						hideExpression: 'model.chooseForm != 2',
					},
					{
						key: 'emailApplication',
						type: 'email',
						hideExpression: 'model.chooseForm != 2',
					},
					{
						key: 'countryApplication',
						type: 'select',
						defaultValue: 'Norway',
						templateOptions: {
							label: 'Country',
							options: [],
							labelProp: 'name',
							valueProp: 'name'
						},
						hideExpression: 'model.chooseForm != 2',
						controller: ['$scope', 'countryFactory', function($scope, countryFactory) {
							$scope.to.loading = countryFactory.allCountries().then(function(response){
								$scope.to.options = response.data;
								return response;
							});
						}]
					},
					{
						key: 'maritalStatusApplication',
						type: 'select',
						defaultValue: 'single',
						templateOptions: {
							label: 'Marital status',
							options: [
								{
									name: 'Married',
									val: 'married',
								},
								{
									name: 'Living common law',
									val: 'living common law',
								},
								{
									name: 'Widowed',
									val: 'widowed',
								},
								{
									name: 'Separated',
									val: 'separated',
								},
								{
									name: 'Divorced',
									val: 'divorced',
								},
								{
									name: 'Single',
									val: 'single',
								}				
							],
							labelProp: 'name',
							valueProp: 'val'
						},
						hideExpression: 'model.chooseForm != 2'
					},
					{
						key: 'choosePositionApplication',
						type: 'radioBtn',
						templateOptions: {
							label: 'Choose position',
							onClick: function ($viewValue, $modelValue, scope) {
								if($viewValue === 'Stylist') {
									scope.index = 1;
									scope.formState.activeRadio = scope.index;
								} else if ($viewValue === 'Logistics crew') {
									scope.index = 2;
									scope.formState.activeRadio = scope.index;
								} else if ($viewValue === 'Other') {
									scope.index = 3;
									scope.formState.activeRadio = scope.index;
								}
								
							},
							options: [
								{
									key: 'stylist',
									name: 'Stylist',
									value: 'Stylist'
								},
								{
									key: 'logisticsCrew',
									name: 'Logistics crew',
									value: 'Logistics crew'
								},
								{
									key: 'other',
									name: 'Other',
									value: 'Other'
								}		
							]
						},
						className: 'radio-btn',
						hideExpression: 'model.chooseForm != 2'			
					},
					{
						key: 'application',
						type: 'textarea',
						templateOptions: {
							placeholder: 'Your application',
							label: 'Application',
							rows: 15
						},
						hideExpression: 'model.chooseForm != 2'
					},
					{
						key: 'fileApplication',
						type: 'file',
						templateOptions: {
							placeholder: 'Your CV',
							label: 'Your CV',
							required: true
						},
						controller: ['$scope', function($scope) {
							$scope.upload = function (files) {
								if (files && files.length) {
									$scope.file = files;
									vm.data.cv = $scope.file;
									vm.options.formState.fileLoaded = true;
								}
							};
						}], 
						hideExpression: 'model.chooseForm != 2'
					},
					{
						key: 'fileLoad',
						type: 'hidden',
						templateOptions: {
							required: true,
						},
						hideExpression: 'model.chooseForm != 2',
						expressionProperties: {
						  'validation.show': 'vm.options.formState.fileLoaded === true ? null : true'
						},
						validation: {
						  show: true
						}
					},
					{
						key: 'portfolioCollaboration',
						type: 'url',
						templateOptions: {
							label: 'Portfolio url',
							placeholder: 'myportfolio.com'
						},
						hideExpression: 'model.chooseForm != 2 || model.choosePositionApplication != "Stylist"',
						expressionProperties: {
						  'templateOptions.required': 'model.choosePositionApplication != "Stylist"'
						},					
					},
				]
			},
			{
				fieldGroup : [
					{
						key: 'contractor',
						type: 'select',
						defaultValue: 'Boa',
						templateOptions: {
							label: 'Oppdragsgiver',
							options: [
								{
									name: 'Boa',
									val: 'Boa',
								}
							],
							labelProp: 'name',
							valueProp: 'val'
						},
						hideExpression: 'model.chooseForm != 3'	
					},
					{
						key: 'contractorOffice',
						type: 'select',
						defaultValue: 'Vest',
						templateOptions: {
							label: 'Meglerkontor',
							options: [
								{
									name: 'Vest',
									val: 'Vest',
								},
								{
									name: 'Øst',
									val: 'Øst',
								},
								{
									name: 'Moss',
									val: 'Moss',
								},
							],
							labelProp: 'name',
							valueProp: 'val'
						},
						hideExpression: 'model.chooseForm != 3'	
					},
					{
						key: 'broker',
						type: 'autocomplete',
						templateOptions: {
						  label: 'Megler',
						  options: broker	
						},
						hideExpression: 'model.chooseForm != 3',
					},
					{
						key: 'phoneApplication',
						type: 'phoneNumber',
						hideExpression: 'model.chooseForm != 3',
					},
					{
						key: 'emailApplication',
						type: 'email',
						hideExpression: 'model.chooseForm != 3',
					}
				]
			}	
		];
		
		function submitFormFile() {
			Upload.upload({
				url: 'wp-content/themes/Josefin/handler.php',
				file: vm.data.cv,
				data: { 
					model: vm.model
				},
			}).progress(function (evt) {
				var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
				$scope.progress = 'progress: ' + progressPercentage + '%' + ' ' + evt.config.file[0].name;
			}).success(function (data, status, headers, config) {
				console.log(data);
				$scope.complete = config.file[0].name + ' was successfully uploaded.';
				$scope.errors = data.errors;
			}).error(function (data, status) {
				console.log('error status: ' + status);
			});
		}
		
		function submitForm() {
			$http({
				method : 'POST',
				url : 'wp-content/themes/Josefin/handler.php',
				data : { model: vm.model, files: vm.data.cv },
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
			})
			.success(function(data) {
				if (!data.success) {
					// if not successful, bind errors to error variables
					$scope.submissionMessage = data.messageError;
					$scope.cleanMessage = JSON.stringify(data.errors);
					$scope.cleanMessage = $scope.cleanMessage.replace(/{"(\w+)"(:)"([æøå\-\w\s]+)"}/, '$1$2 $3');
					$scope.submission = $scope.cleanMessage; //shows the error message
					$scope.error = true;
				} else {
					// if successful, bind success message to message
					$scope.submissionMessage = data.messageSuccess;
					$scope.formData = {}; // form fields are emptied with this line
					$scope.submission = ""; //shows the success message}
					$scope.error = false;
				}
			});
		}
		
		vm.submitFormFile = submitFormFile;
		vm.submitForm = submitForm;
	}]);
	
	
	
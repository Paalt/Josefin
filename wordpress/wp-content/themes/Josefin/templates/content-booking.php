<section class="contact-formly" layout="column" ng-controller="formController as vm">
	<form novalidate>
        <formly-form model="vm.model" fields="vm.fields" form="vm.contactForm" options="vm.options">
            <p ng-if="submissionMessage" class="response" ng-class="{error: error, success: !error}">{{submissionMessage}}</p>
            <p ng-if="submissionMessage" class="error-response" ng-class="{error: error, success: !error}">{{submission}}</p> 
            <div class="form-group center">
                <button type="submit" ng-if="vm.model.chooseForm != 2" ng-click="vm.submitForm()" ng-disabled="vm.contactForm.$invalid" class="btn">Submit</button>
                <button type="submit" ng-if="vm.model.chooseForm == 2" ng-click="vm.submitFormFile()" ng-disabled="vm.contactForm.$invalid" class="btn">Submit</button>
                <button type="button" ng-click="vm.options.resetModel()" class="btn">Reset</button>
            </div>
        </formly-form>
    </form>
</section>


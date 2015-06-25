<div id="wrap-all-blocks">
	<div ng-repeat="layout in createLayoutBlock(r) track by $index">
    	<work-layout-block ng-init="incrementByOne(); incrementByFour();" category="catCtrl.category" iterate="{{$index}}"></work-layout-block>
    </div>
</div>


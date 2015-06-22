<div id="wrap-all-blocks">
	<div ng-repeat="layout in createLayoutBlock(r) track by $index">
    	<work-layout-block ng-init="incrementByOne(); incrementByFour();" iterate="{{$index}}"></work-layout-block>
    </div>
</div>


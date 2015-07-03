<ul id="menu-exhibition-menu">
	<li>
    	<a href="" ng-click="setActiveExhibition('')">ALL</a>
    </li>
	<li ng-repeat="exhibition in exhibitions | filter: {parent: {ID: 19}}">
    	<a href="#" ng-click="setActiveExhibition(exhibition.name)">{{exhibition.name | uppercase}}</a>
    </li>
</ul>

<ul id="menu-category-menu">
	<li>
    	<a href="" ng-click="setCategory('')">ALL</a>
    </li>
	<li ng-repeat="category in categories | filter: {parent: {ID: 18}}">
    	<a href="#" ng-click="setCategory(category.name)">{{category.name | uppercase}}</a>
    </li>
</ul>

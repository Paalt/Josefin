<ul id="menu-exhibition-menu">
	<li>
    	<a href="" ng-click="setActiveExhibition('')">ALL</a>
    </li>
	<li ng-repeat="post in posts">
    	<a href="#" ng-click="setActiveExhibition(post.title); test();">{{post.title | uppercase}}</a>
    </li>
</ul>

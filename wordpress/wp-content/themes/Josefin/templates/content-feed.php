<section class="feedcontainer" ng-controller="instagramCtrl">
	<p>josefinjohanssonstudio</p>
    <ul layout="row" class="feedgrid">
        <li ng-repeat="p in pics">
            <a ng-href="{{p.link}}"><img ng-src="{{p.images.low_resolution.url}}"></a>
        </li>
    </ul>
</section>


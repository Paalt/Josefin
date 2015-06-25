<section ng-controller="instagramCtrl">
    <ul>
        <li ng-repeat="p in pics">
            <a ng-href="{{p.link}}"><img ng-src="{{p.images.standard_resolution.url}}"></a>
        </li>
    </ul>
</section>


<section id="wrap-all-blocks" layout="row">
	<article flex="50" class="large-post">
        <figure ng-repeat="post in posts" ng-switch="$even" ng-class-even="'even'"
        ng-class-odd="'odd'" class="work-container">
            <a ng-href="{{post.link}}">
                <img ng-switch-when="true" ng-repeat="category in post.terms.category" ng-if="category.name == 'large' || category.name == 'medium'" ng-src="{{post.featured_image.source}}" alt="{{post.title}}" class="{{category.name}}">
                <figcaption class="work-title">{{post.title | uppercase}}</figcaption>
            </a>
        </figure>
    </article>
    <article flex="50" class="large-post">
        <figure ng-repeat="post in posts" ng-switch="$even" ng-class-even="'even'"
        ng-class-odd="'odd'" class="work-container">
            <a ng-href="{{post.link}}">
                <img ng-switch-when="false" ng-repeat="category in post.terms.category" ng-if="category.name == 'large' || category.name == 'medium'" ng-src="{{post.featured_image.source}}" alt="{{post.title}}" class="{{category.name}}">
                <figcaption class="work-title">{{post.title | uppercase}}</figcaption>
            </a>
        </figure>
    </article>
</section>


<div id="wrap-block">
    <section id="top-row" layout="row">
        <div flex="50" id="first-second-column" layout="row">
            <div flex="100" id="large-column-left-top" layout="column">
            <!-- top-left-large column -->
                <article ng-if="iterate == byBlock" flex class="large-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 23}}}">
                    <aside class="work-container" ng-if="$index == byPostLargeMedium">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
        </div>
        <div flex="50" id="third-fourth-column" layout="row" layout-align="center start">
            <div flex="50" id="small-column-left-top" layout="column">
           <!-- top-right-left-small column -->
                <article ng-if="iterate == byBlock" flex class="small-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 20}}}">
                    <aside class="work-container" ng-if="$index == byPostSmall">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
                
                <article ng-if="iterate == byBlock" flex class="small-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 20}}}">
                    <aside class="work-container" ng-if="$index == (byPostSmall + 1)">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
            <div flex="50" id="small-column-right-top" layout="column">
                <!-- top-right-right-small column -->
                <article ng-if="iterate == byBlock" flex class="small-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 20}}}">
                    <aside class="work-container" ng-if="$index == (byPostSmall + 2)">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                    </aside>
                </article>
                
                <article ng-if="iterate == byBlock" flex class="small-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 20}}}">
                    <aside class="work-container" ng-if="$index == (byPostSmall + 3)">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
        </div>
    </section>
    
    <section id="bottom-row" layout="row">
        <div flex="50" id="first-second-column" layout="row" layout-align="center start">
            <div flex="50" id="medium-column-left-bottom" layout="column">
                <!-- bottom-left-left-medium column -->
                <article ng-if="iterate == byBlock" flex class="medium-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 21}}}">
                    <aside class="work-container" ng-if="$index == byPostLargeMedium">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
            <div flex="50" id="medium-column-right-bottom" layout="column">
                <!-- bottom-left-right-medium column -->
                <article ng-if="iterate == byBlock" flex class="medium-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 21}}}">
                    <aside class="work-container" ng-if="$index == (byPostLargeMedium + 1)">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
        </div>
        <div flex="50" id="third-fourth-column" layout="row">
            <div flex="100" id="large-column-right-bottom" layout="column">
                <!-- large-right-bottom column -->
                <article ng-if="iterate == byBlock" flex class="large-post" ng-repeat="post in posts | filter: {terms: {category: {ID: 23}}}">
                    <aside class="work-container" ng-if="$index == (byPostLargeMedium + 1)">
                        <img ng-src="{{post.featured_image.source}}" alt="{{post.title}}">
                        <p class="work-title">{{post.title | uppercase}}</p>
                    </aside>
                </article>
            </div>
        </div>
    </section>
</div>
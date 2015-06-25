<div id="wrap-block">
    <section id="studio-info">
        <article class="studio-item" ng-repeat="post in posts | filter: {terms: {category: {name: 'studio'}}}">
            <header ng-if="$index === 3" class="contact-heading">
                <h2 class="zeta">{{post.title | uppercase}}</h2>
            </header>
            <p ng-if="$index === 3" ng-bind-html="post.content | uppercase"></p>
        </article>
        <article class="contact-form">
            <p>FOR BOOKING OR WORK REQUESTS:</p>
            <input class="btn" type="submit" id="contactBtn" value="REQUEST"></input>
        </article>
        <article class="studio-item" ng-repeat="post in posts | filter: {terms: {category: {name: 'studio'}}}">
            <header ng-if="$index === 2" class="contact-heading">
                <h2 class="zeta">{{post.title | uppercase}}</h2>
            </header>
            <p ng-if="$index === 2" ng-bind-html="post.content | uppercase"></p>
        </article>
        <article class="studio-item" ng-repeat="post in posts | filter: {terms: {category: {name: 'studio'}}}">
            <header ng-if="$index === 1" class="contact-heading">
                <h2 class="zeta">{{post.title | uppercase}}</h2>
            </header>
            <p ng-if="$index === 1" ng-bind-html="post.content | uppercase"></p>
        </article>
        <article class="studio-item" ng-repeat="post in posts | filter: {terms: {category: {name: 'studio'}}}">
            <header ng-if="$index === 0" class="contact-heading">
                <h2 class="zeta">{{post.title | uppercase}}</h2>
            </header>
            <p ng-if="$index === 0" ng-bind-html="post.content | uppercase"></p>
        </article>
    </section>
    <section id="employees-list" layout="row" layout-wrap>
        <article flex="33" class="employees" ng-repeat="post in posts.slice().reverse() | filter: {terms: {category: {name: 'employees'}}}">
        	<header class="employee-name">
                <h2>{{post.title | uppercase}}</h2>
            </header>
            <p ng-bind-html="post.content | uppercase"></p>
        </article>
    </section>
    <footer id="conatct-footer">
    	<img src="http://www.qcumber.no/Josefin/wordpress/wp-content/uploads/2015/06/20150107_MAP.jpg" alt="map">
    </footer>
</div>
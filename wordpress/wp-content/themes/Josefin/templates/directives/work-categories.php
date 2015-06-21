<div id="wrapthework">
	<section id="top-row" layout="row">
        <div flex="50" id="first-second-column" layout="row">
            <div flex="100" id="medium-column-left-top" layout="column">
                <article flex class="medium-post" ng-repeat="post in posts">
                        <aside>
                        top-left-medium
                        </aside>
                </article>
            </div>
        </div>
        <div flex="50" id="third-fourth-column" layout="row">
            <div flex="50" id="small-column-left-top" layout="column">
                <article flex class="small-post" ng-repeat="post in posts">
                        <aside>
                        top-right-left-small
                        </aside>
                </article>
            </div>
            <div flex="50" id="small-column-right-top" layout="column">
                <article flex class="small-post" ng-repeat="post in posts">
                        <aside>
                        top-right-right-small
                        </aside>
                </article>
            </div>
        </div>
    </section>
    
    <section id="bottom-row" layout="row">
        <div flex="50" id="first-second-column" layout="row">
            <div flex="50" id="small-column-left-bottom" layout="column">
                <article flex class="small-post" ng-repeat="post in posts">
                        <aside>
                        bottom-left-left-small
                        </aside>
                </article>
            </div>
            <div flex="50" id="small-column-right-bottom" layout="column">
                <article flex class="small-post" ng-repeat="post in posts">
                        <aside>
                        bottom-left-right-small
                        </aside>
                </article>
            </div>
        </div>
        <div flex="50" id="third-fourth-column" layout="row">
            <div flex="100" id="medium-column-right-bottom" layout="column">
                <article flex class="medium-post" ng-repeat="post in posts" ng-bind="posts">
                        <aside>
                        medium-right-bottom
                        </aside>
                </article>
            </div>
        </div>
    </section>
</div>

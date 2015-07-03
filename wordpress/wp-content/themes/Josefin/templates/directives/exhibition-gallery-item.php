
<div ng-init="activeExhibition = 'Angels'" class="swiper-wrapper">
	<!-- Slides -->
	<div class="swiper-slide" ng-repeat="post in posts | filter: {terms: {category: {name: activeExhibition}}}" on-finish-render="swiperInit()">
        <!--Layout: 1 column, 1 large picture -->
        <section ng-repeat="cat in post.terms.category" ng-if="cat.name === '1 bilde'" class="ett-bilde" layout="column">
            <article class ng-bind-html="post.content" flex class="large-image-container">
                
            </article>
            <footer flex>
            	<p flex ng-bind-html="post.title"></p>
            </footer>
            
        </section>
        <!--Layout: 2 columns, text column to the left and picture column to the right -->
        <section ng-repeat="cat in post.terms.category" ng-if="cat.name === '1h bilde 1v tekst'" class="etth-bilde-ettv-tekst" layout="column">
            <article ng-bind-html="post.content" flex="50" class="medium-text-container">
                
            </article>
            <footer flex>
            	<p flex ng-bind-html="post.title"></p>
            </footer>
        </section>
        
        <!--Layout: 2 columns, 2 pictures -->
        <section ng-repeat="cat in post.terms.category" ng-if="cat.name === '2 bilder'" class="to-bilder" layout="column">
            <article ng-bind-html="post.content" flex="50" class="medium-image-container">
                
            </article>
            <footer flex>
            	<p flex ng-bind-html="post.title"></p>
            </footer>
        </section>
	</div>
</div>
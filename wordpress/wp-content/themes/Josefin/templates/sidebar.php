<section class="sidebar-content" ng-controller="mainMenuCtrl">
	
    <button ng-click="menuToggle =! menuToggle" id="menu-toggle">
        <img src="http://www.qcumber.no/Josefin/wordpress/wp-content/themes/Josefin/dist/images/menu_triangel.svg" alt="Menu toggle">
    </button>
    
    <div ng-show="menuToggle" class="visibility">
    	<?php 
			dynamic_sidebar('sidebar-primary'); 
			
			if(is_page( 7 )) {
				get_template_part('templates/navigation', 'categories');	
			}
			
			if(is_page( 11 )) {
				get_template_part('templates/navigation', 'exhibition');	
			}
		?>
    </div>
   
</section>



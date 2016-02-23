<section class="sidebar-content">
	<img id="menu-toggle" ng-mouseenter="menuCtrl.menu()" src="http://www.qcumber.no/Josefin/wordpress/wp-content/themes/Josefin/dist/images/menu_triangel.svg" alt="Menu toggle">
        
    <div ng-hide="toggleMenu" class="visibility">
    	<?php 
			dynamic_sidebar('sidebar-primary'); 
			
			if(is_page( 7 )) {
				get_template_part('templates/navigation', 'categories');	
			}
			
			if(is_page( 11 )) {
				get_template_part('templates/navigation', 'exhibition');	
			}
		?>
        <div class="edge" ng-mouseleave="menuCtrl.menu()"></div>
    </div>
</section>



<header class="banner" role="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
    	<img class="logo" src="http://www.qcumber.no/Josefin/wordpress/wp-content/themes/Josefin/dist/images/logo.svg"></a>
    <nav role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>

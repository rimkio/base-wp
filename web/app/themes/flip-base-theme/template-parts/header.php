<?php
/**
 * Header template
 */

$classes = [
	'main-header',
];
?>
<header id="site-header" class="<?php echo implode( ' ', $classes ) ?>">
  <div class="container">
    <div class="header-inner">
      <div class="site-brand">
        <?= get_theme_mod( 'custom_logo' ) ? get_custom_logo() : '<img src="http://via.placeholder.com/150x150?text=logo" class="custom-logo" alt="logo" />'; ?>
      </div> <!-- .site-brand -->
        <div class="navigation-wrap">
            <?php wp_nav_menu( [
	            'theme_location'  => 'main-menu',
	            'menu_class'      => 'main-menu',
	            'container_class' => 'menu-container',
	            'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
	            'bootstrap'       => true
            ] ); ?>
        </div>
    </div>
  </div>
</header> <!-- #site-header -->

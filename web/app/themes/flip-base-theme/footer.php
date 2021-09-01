<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package flip_base
 */

echo "</div><!--End site wrap-->";

/**
 * flip_base_hook_footer hook.
 * @see flip_base_footer_template - 20
 */
do_action( 'flip_base_hook_footer' );

wp_footer();
?>
</body>
</html>

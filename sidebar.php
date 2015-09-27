<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bootville
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<!-- Customizer control for layout -->
		<?php
		if ( 'option2' == fifteen_plus_sanitize_sidebar_layout( get_theme_mod( 'fifteen_plus_sidebar_layout' ) ) ) : ?>
			<div id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">					
		<?php else : ?>
			<div id="secondary" class="widget-area col-md-4 col-lg-4 col-md-pull-8" role="complementary">
		<?php endif; ?>
	<!-- End customizer control -->	

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->

</div> <!-- .row -->
</div> <!-- .container -->
<?php
/**
 * The footer sidebar
 *
 * @package SOE-Faculty
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<div id="supplementary">
	<div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #footer-widgets -->
</div><!-- #supplementary -->
                
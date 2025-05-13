<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
	the_post();

	wc_get_template_part( 'content', 'single-product' );

endwhile;

do_action( 'woocommerce_after_main_content' );

// get_footer( 'shop' ); 
// <-- This loads footer-shop.php if it exists, or footer.php

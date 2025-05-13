<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Afri Beads
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'afribeads' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container nav-container">
			<div class="site-branding">
				<?php if(has_custom_logo()): ?>
					<?php the_custom_logo(); ?>
				<?php else: ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<div class="logo-mark"></div>
						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					</a>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<!-- Desktop Navigation -->
			<nav id="desktop-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="menu nav-menu">%3$s</ul>',
						'walker'         => new Afri_Custom_Nav_Walker(),
					)
				);
				?>
			</nav><!-- #desktop-navigation -->
			
			<!-- Mobile Navigation -->
			<nav id="mobile-navigation" class="mobile-navigation">
				<button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
					<span class="menu-toggle-icon"><i class="fas fa-bars"></i></span>
					<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'afribeads' ); ?></span>
				</button>
				<div class="mobile-menu-container">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'mobile-menu',
							'container'      => false,
							'items_wrap'     => '<ul id="%1$s" class="menu nav-menu">%3$s</ul>',
							'walker'         => new Afri_Custom_Nav_Walker(),
						)
					);
					?>
				</div>
			</nav><!-- #mobile-navigation -->
		</div>
	</header><!-- #masthead -->
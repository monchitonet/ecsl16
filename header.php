<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chocolita
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ecsl16' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			
			<div class="columns column-6 site-branding">
				<a href="<?php echo site_url(); ?>"><img src="http://localhost/~leogg/encuentro/wp-content/themes/ecsl16/img/ecsl16logo.png" /></a>
			</div><!-- .site-branding -->

			<div class="columns column-6 text-right">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="dashicons dashicons-menu"></span></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			
		</div><!-- .row -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

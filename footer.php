<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chocolita
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer footer-padding" role="contentinfo">
		<div class="row">
			
			<div class="columns column-1">
				<?php dynamic_sidebar( 'footer_left' ); ?>
			</div>
			
			<div class="columns column-7">
				<?php dynamic_sidebar( 'footer_center' ); ?>
			</div>
			
			<div class="columns column-4 text-right">
				<?php dynamic_sidebar( 'footer_right' ); ?>
			</div>
			
		</div><!-- .row -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

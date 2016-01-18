<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chocolita
 */

get_header(); ?>

	<section class="post-header section-padding">
		<div class="row">

			<div class="columns column-12 text-center">
				<?php
				while ( have_posts() ) : the_post();
				echo '<h2>';
					the_title();
				echo '</h2>';
				?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

	<section class="posts section-padding">
		<div class="row">

			<div class="columns column-12 text-left">
				
				<p><span class="dashicons dashicons-admin-home"></span>&nbsp;Sitio web:&nbsp;<a href="<?php echo get_post_meta($post->ID, "_url", true)?>" target="_blank"><?php echo get_post_meta($post->ID, "_url", true)?></a></p>
				<?php
				the_content();
				?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

<?php if ( comments_open() ) { ?>
	<section class="comments-area section-padding">
		<div class="row">

			<div class="columns column-12 text-left">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					get_comments_number();
					comments_template();
					?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

<?php } else { // comments are closed 
	} endwhile;?>

<?php
get_footer();

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

			<div class="columns column-8 text-left">
				<?php
				the_content();
				?>
			</div>

			<div class="columns column-4">
				<?php
				the_post_thumbnail();
				?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

	<?php endwhile; // End of the loop. ?>

<?php
get_footer();

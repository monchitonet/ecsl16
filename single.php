<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

	<section class="comments-area section-padding">
		<div class="row">

			<div class="columns column-12 text-left">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

<?php
get_footer();

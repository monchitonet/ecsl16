<?php
/**
 * The template for displaying archive pages.
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
				if ( have_posts() ) : ?>

						<?php
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>

			</div>

		</section><!-- .row -->
	</div><!-- section -->

	<section class="posts section-padding">
		<div class="row">

			<div class="columns column-12 text-left">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();?>

					<a href="<?php the_permalink();?>"><h4><?php the_title(); ?></h4></a>
					<p><?php the_excerpt(); ?></p>

					<?php endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>

		</section><!-- .row -->
	</div><!-- section -->

<?php
get_footer();

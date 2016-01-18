<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Chocolita
 */

get_header(); ?>

	<section class="post-header section-padding">
		<div class="row">

			<div class="columns column-12 text-center">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ecsl16' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			</div>

		</section><!-- .row -->
	</div><!-- section -->

	<section class="posts section-padding">
		<div class="row">

			<div class="columns column-12 text-left">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

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

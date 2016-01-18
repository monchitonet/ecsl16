<?php
/**
 * The template for the Sponsors pages.
 *
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

	<section class="sponsors-block section-padding">
		<div class="row">

			<h2 class="text-center"><?php esc_html_e( 'Thanks to our Sponsors!', 'ecsl16' ); ?></h2> 

				<?php
				$args = array( 'post_type' => 'sponsors', 'posts_per_page' => 0, 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
				<div class="columns column-3 text-center">
					<h3><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-sponsors'); ?></a></h3>
				</div>

				<?php endwhile;
			?>

		</div><!-- .row -->
	</section><!-- section -->

<?php
get_footer();

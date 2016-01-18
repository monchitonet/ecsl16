<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chocolita
 */

get_header(); ?>

	<section class="main-event section-padding">
		<div class="row">

			<div class="columns column-5 text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logoE16.png" />
			</div>

			<div class="columns column-7">
				<?php 
					$val	= 'portada_option_name'; //desired values to be fetched
					$opt 	= $wpdb -> get_row("SELECT * FROM $wpdb->options WHERE option_name = '$val'");
					$opts 	= $opt -> option_value;
					$array 	= unserialize($opts);
					//Printing out featured event details
					echo '<ul class="main-event-list">';
					echo '<li>'.$array['event_date'].'</li>';
					echo '<li>'.$array['event_name'].'</li>';
					echo '<li>'.$array['event_venue'].'</li>';
					echo '<li>'.$array['event_desc'].'</li>';
					echo '</ul>';
					echo '<a href="'.$array['event_url'].'"><button class="main-event-button">'.$array['event_btn'].'</button></a>';
				?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

	
	<section class="about-us section-padding">
		<div class="row">

			<?php dynamic_sidebar( 'home_about_us' ); ?>

		</div><!-- .row -->
	</section><!-- section -->

	<section class="main-map section-padding">
		<div class="row">

			<div class="columns column-12">

				<div class="columns column-4">
					<?php dynamic_sidebar( 'map_infobox' ); ?>
				</div>
				
			</div>

		</div><!-- .row -->
	</section><!-- section -->
	
	<section class="news-block section-padding">
		<div class="row">

			<h2 class="text-center"><?php esc_html_e( 'News', 'ecsl16' ); ?></h2> 

				<?php
				$args = array( 'category_name' => 'noticias', 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
				<div class="columns column-4 text-right">
					<h4><?php echo get_the_date(); ?></h4>
					<h6><?php esc_html_e( 'Published by: ', 'ecsl16' ); the_author(); ?></h6>
				</div>

				<div class="columns column-8">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</div>

				<?php endwhile;
			?>

		</div><!-- .row -->
	</section><!-- section -->

	<section class="about-us section-padding">
		<div class="row">
			
			<h2 class="text-center"><?php esc_html_e( 'General Information', 'ecsl16' ); ?></h2> 
			
			<div class="columns column-3 text-center">
				<?php dynamic_sidebar( 'info_one' ); ?>
			</div>
			
			<div class="columns column-3 text-center">
				<?php dynamic_sidebar( 'info_two' ); ?>
			</div>
			
			<div class="columns column-3 text-center">
				<?php dynamic_sidebar( 'info_three' ); ?>
			</div>
			
			<div class="columns column-3 text-center">
				<?php dynamic_sidebar( 'info_four' ); ?>
			</div>

		</div><!-- .row -->
	</section><!-- section -->

	<section class="sponsors-block section-padding">
		<div class="row">

			<h2 class="text-center"><?php esc_html_e( 'Sponsors', 'ecsl16' ); ?></h2> 

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

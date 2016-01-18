<?php
/**
 * Chocolita functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chocolita
 */

if ( ! function_exists( 'ecsl16_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ecsl16_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Chocolita, use a find and replace
	 * to change 'ecsl16' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ecsl16', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Custom image size for sponsors
	add_action( 'after_setup_theme', 'chocolita_custom_thumbnail_size' );
	function chocolita_custom_thumbnail_size(){
		add_image_size( 'thumb-sponsors', 195, 195 );
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ecsl16' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ecsl16_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ecsl16_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecsl16_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecsl16_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecsl16_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecsl_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'About us section', 'ecsl16' ),
		'id'            => 'home_about_us',
		'before_widget' => '<div class="columns column-12 text-center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer left column', 'ecsl16' ),
		'id'            => 'footer_left',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer center column', 'ecsl16' ),
		'id'            => 'footer_center',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer right column', 'ecsl16' ),
		'id'            => 'footer_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Map infobox', 'ecsl16' ),
		'id'            => 'map_infobox',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'General info 1', 'ecsl16' ),
		'id'            => 'info_one',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'General info 2', 'ecsl16' ),
		'id'            => 'info_two',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'General info 3', 'ecsl16' ),
		'id'            => 'info_three',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'General info 4', 'ecsl16' ),
		'id'            => 'info_four',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'ecsl_widgets_init' );

/**
 * Adding image widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget("pu_media_upload_widget");' ) );

class pu_media_upload_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'pu_media_upload',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'pu_media_upload', 'Media Upload Widget', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/js/upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
        $title = __('Widget Image');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
			<p><?php echo $instance['image'] ?></p>

        </p>
    <?php
    }
}

/**
 * Enqueue scripts and styles.
 */
function ecsl16_scripts() {
	wp_enqueue_style( 'ecsl16-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'dashicons' );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'ecsl16-smooth', get_template_directory_uri() . '/js/smoothscroll.js', array(), '1.0.0', true );

	wp_enqueue_script( 'ecsl16-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ecsl16-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecsl16_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Include front page options in admin.
 */
include 'portada-options.php';

/**
 * Enqueuing Google Fonts.
 */
function ecsl16_add_google_fonts() {

wp_enqueue_style( 'ecsl16-google-fonts', 'http://fonts.googleapis.com/css?family=Abel', false ); 
}

add_action( 'wp_enqueue_scripts', 'ecsl16_add_google_fonts' ); 

/**
 * Register Sponsors custom post type.
 *
 */
function ecsl_sponsor_posttype() {
	register_post_type( 'sponsors',
		array(
			'labels' => array(
				'name' => esc_html__( 'Sponsors', 'ecsl16' ),
				'singular_name' => esc_html__( 'Sponsor', 'ecsl16' ),
				'add_new' => esc_html__( 'Add New Sponsor', 'ecsl16' ),
				'add_new_item' => esc_html__( 'Add New Sponsor', 'ecsl16' ),
				'edit_item' => esc_html__( 'Edit Sponsor', 'ecsl16' ),
				'new_item' => esc_html__( 'Add New Sponsor', 'ecsl16' ),
				'view_item' => esc_html__( 'View Sponsor', 'ecsl16' ),
				'search_items' => esc_html__( 'Search Sponsor', 'ecsl16' ),
				'not_found' => esc_html__( 'No Sponsors Found', 'ecsl16' ),
				'not_found_in_trash' => esc_html__( 'No Sponsors Found in Trash', 'ecsl16' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "sponsors"), // Permalinks format
			'menu_position' => 5,
			'menu_icon' => 'dashicons-heart',
			'register_meta_box_cb' => 'add_sponsors_metaboxes'
		)
	);
}

add_action( 'init', 'ecsl_sponsor_posttype' );

// Add the Sponsors Meta Boxes
function add_sponsors_metaboxes() {
	add_meta_box('ecsl_sponsors_location', esc_html__( 'Sponsor Details', 'ecsl16' ), 'ecsl_sponsors_location', 'sponsors', 'normal', 'high');
}

// The Sponsor URL Metabox
function ecsl_sponsors_location() {
	global $post;
	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="sponsormeta_noncename" id="sponsormeta_noncename" value="' . 
	wp_create_nonce( get_template_directory_uri() ) . '" />';
	
	// Get the location data if its already been entered
	$location = get_post_meta($post->ID, '_location', true);
    $url = get_post_meta($post->ID, '_url', true);
	
	// Echo out the field
    echo '<p>'.esc_html__( 'Sponsor website URL', 'ecsl16' ).'</p>';
    echo '<input type="text" name="_url" value="' . $url  . '" class="widefat" />';

}

// Save the Metabox Data
function ecsl_save_sponsors_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['sponsormeta_noncename'], get_template_directory_uri() )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$sponsors_meta['_url'] = $_POST['_url'];
	
	// Add values of $sponsors_meta as custom fields
	
	foreach ($sponsors_meta as $key => $value) { // Cycle through the $sponsors_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'ecsl_save_sponsors_meta', 1, 2); // save the custom fields

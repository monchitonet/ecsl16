<?php
/**
 * Portada options in admin.
 *
 * Options page for editing the main event on the front page.
 *
 *
 * @package Chocolita
 */

class FrontPageOptions
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            esc_html__( 'Front Page', 'ecsl16' ), 
            'manage_options', 
            'portada-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'portada_option_name' );
        ?>
        <div class="wrap">
            <h2><?php esc_html__( 'Front Page', 'ecsl16' ) ?></h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'portada_option_group' );   
                do_settings_sections( 'portada-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'portada_option_group', // Option group
            'portada_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            esc_html__( 'Front Page Options', 'ecsl16' ), // Title
            array( $this, 'print_section_info' ), // Callback
            'portada-setting-admin' // Page
        );  

        add_settings_field(
            'event_name', // ID
            esc_html__( 'Event name', 'ecsl16' ), // Title 
            array( $this, 'event_name_callback' ), // Callback
            'portada-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'event_date', 
            esc_html__( 'Event date', 'ecsl16' ), 
            array( $this, 'event_date_callback' ), 
            'portada-setting-admin', 
            'setting_section_id'
        );      

        add_settings_field(
            'event_venue', 
            esc_html__( 'Event venue', 'ecsl16' ), 
            array( $this, 'event_venue_callback' ), 
            'portada-setting-admin', 
            'setting_section_id'
        );  

        add_settings_field(
            'event_desc', 
            esc_html__( 'Event description', 'ecsl16' ), 
            array( $this, 'event_desc_callback' ), 
            'portada-setting-admin', 
            'setting_section_id'
        ); 

        add_settings_field(
            'event_btn', 
            esc_html__( 'Button text', 'ecsl16' ), 
            array( $this, 'event_btn_callback' ), 
            'portada-setting-admin', 
            'setting_section_id'
        ); 

        add_settings_field(
            'event_url', 
            esc_html__( 'Button URL', 'ecsl16' ), 
            array( $this, 'event_url_callback' ), 
            'portada-setting-admin', 
            'setting_section_id'
        ); 
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['event_name'] ) )
            $new_input['event_name'] = sanitize_text_field( $input['event_name'] );

        if( isset( $input['event_date'] ) )
            $new_input['event_date'] = sanitize_text_field( $input['event_date'] );

        if( isset( $input['event_venue'] ) )
            $new_input['event_venue'] = sanitize_text_field( $input['event_venue'] );

        if( isset( $input['event_desc'] ) )
            $new_input['event_desc'] = sanitize_text_field( $input['event_desc'] );

        if( isset( $input['event_btn'] ) )
            $new_input['event_btn'] = sanitize_text_field( $input['event_btn'] );

        if( isset( $input['event_url'] ) )
            $new_input['event_url'] = sanitize_text_field( $input['event_url'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print esc_html__( 'This is the configuration page for the main event on the Front Page.', 'ecsl16' );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_name_callback()
    {
        printf(
            '<input type="text" id="event_name" name="portada_option_name[event_name]" value="%s" /><p class="description">'.esc_html__( 'Enter the event short name. E.g. VIII ECSL 2016.', 'ecsl16' ).'</p>',
            isset( $this->options['event_name'] ) ? esc_attr( $this->options['event_name']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_date_callback()
    {
        printf(
            '<input type="text" id="event_date" name="portada_option_name[event_date]" value="%s" /><p class="description">'.esc_html__( 'Enter the date range. E.g. June 16-18, 2016.', 'ecsl16' ).'</p>',
            isset( $this->options['event_date'] ) ? esc_attr( $this->options['event_date']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_venue_callback()
    {
        printf(
            '<input type="text" id="event_venue" name="portada_option_name[event_venue]" value="%s" /><p class="description">'.esc_html__( 'Enter the city and country. E.g. Managua, Nicaragua.', 'ecsl16' ).'</p>',
            isset( $this->options['event_venue'] ) ? esc_attr( $this->options['event_venue']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_desc_callback()
    {
        printf(
            '<textarea cols="50" rows="5" id="event_desc" name="portada_option_name[event_desc]" value="%s">'. esc_textarea( $this->options["event_desc"] ) .'</textarea><p class="description">'.esc_html__( 'Short description of the event. 150 characters or less.', 'ecsl16' ).'</p>',
            isset( $this->options['event_desc'] ) ? esc_attr( $this->options['event_desc']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_btn_callback()
    {
        printf(
            '<input type="text" id="event_btn" name="portada_option_name[event_btn]" value="%s" /><p class="description">'.esc_html__( 'Call-to-action button text.', 'ecsl16' ).'</p>',
            isset( $this->options['event_btn'] ) ? esc_attr( $this->options['event_btn']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function event_url_callback()
    {
        printf(
            '<input type="text" id="event_url" name="portada_option_name[event_url]" value="%s" /><p class="description">'.esc_html__( 'Enter the event website URL.', 'ecsl16' ).'</p>',
            isset( $this->options['event_url'] ) ? esc_attr( $this->options['event_url']) : ''
        );
    }
}

if( is_admin() )
    $portada_settings_page = new FrontPageOptions();
?>

<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Program_Name {

    var $version = '0.4.0';

    protected static $settings = array();

    function __construct() {
        self::get_settings();
        self::register_shortcodes();
        self::register_callbacks();
        self::register_scripts_stylesheets();
        self::includes();
    }

    // plugin custom codes

    function get_settings() {
        //TODO: implement as dashboard panel settings
        self::$settings = array(
            'option_1' => $value_1,
            'option_n' => $value_n
        );
    }

    function register_shortcodes() {
        add_shortcode( 'program-name', array( $this, 'program_api' ));
    }

    function register_callbacks() {

    }

    function register_scripts_stylesheets() {
        add_action( 'admin_enqueue_scripts', array( $this, 'custom_scripts' ));
        add_action( 'wp_enqueue_scripts', array( $this, 'custom_scripts' ));
        add_action( 'wp_enqueue_scripts', array( $this, 'custom_stylesheets' ));
        add_action( 'wp_print_styles', array( $this, 'custom_print_styles'), 100 );
    }

    function custom_scripts() {
        //wp_enqueue_script( 'tablesort', self::$settings['program']['dir_url'] . 'includes/jquery-tablesorter/jquery.tablesorter.min.js' );
        //wp_enqueue_script( 'tablesort-widget', self::$settings['program']['dir_url'] . 'includes/jquery-tablesorter/jquery.tablesorter.widgets.min.js' );
        wp_enqueue_script( 'bsc-abstract-script', self::$settings['program']['dir_url'] . 'script.js' );
    }

    function custom_stylesheets() {
        wp_enqueue_style( 'bsc-abstract-style', self::$settings['program']['dir_url'] . 'style.css' );
    }

    function custom_print_styles() {
        //wp_deregister_style( 'wp-admin' );
    }

    function includes() {
        //include( self::$settings['program_dir_path'] . 'includes/database.php' );
    }

    //__________________________________________________________________________________________________________________

    function program_api( $atts, $content = null ) {

        global $current_user;

        // list of apis
        $apis = array(
            'action-name' => 'function_name'
        );

        $args = shortcode_atts( array(
            'user' => $current_user->ID,
            'action' => null,
            'attr_1' => null,
            'attr_n' => null,
            'template' => $content
        ), $atts );

        $action = $args['action'];

        // call action if exist
        return method_exists( $this, $apis[ $action ] ) ? call_user_func( array( $this, $apis[ $action ] ), $args ) : print_r( $atts, true );
    }

    protected function do_template( $template, array $values )
    {
        $keys = array_map( function( $key ){ return '{{' . $key . '}}'; }, array_keys( $values ));
        return str_replace( $keys, $values, $template );
    }

    function function_name( $args ) {

        extract( $args );
        // ( $action, $user, $attr_1, $attr_n, $template );

        $values = array(
            'name_1' => $value_1,
            'name_n' => $value_n
        );
        $output .= do_shortcode( self::do_template( $template, $values ));

        return $output;
    }
} 
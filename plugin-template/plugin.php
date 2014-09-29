<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class PluginName {

    var $version = '0.3.0';

    // plugin general initialization

    private static $instance = null;
    private static $settings = array();


    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance( $plugin_name = null ) {

        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        // register plugin
        if ( $plugin_name ) {
            register_activation_hook( $plugin_name, array( self::$instance, 'activate' ) ); // plugin activation actions
            register_deactivation_hook( $plugin_name, array( self::$instance, 'deactivate' ) );
        }

        return self::$instance;
    }

    function __construct() {

        // get plugin settings
        self::get_settings();

        // register shortcodes api
        self::register_shortcodes();

        // register callbacks
        self::register_callbacks();

        // register stylesheet
        self::register_scripts_stylesheets();

        self::includes();
    }

    /**
     * Activation hook for the plugin.
     */
    function activate() {

        //verify user is running WP 3.0 or newer
        if ( version_compare( get_bloginfo( 'version' ), '3.0', '<' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) ); // Deactivate our plugin
            wp_die( __( 'This plugin requires WordPress version 3.0 or higher.', 'grants-review' ) );
        }
        flush_rewrite_rules();
    }

    /**
     * Deactivation hook for the plugin.
     */
    function deactivate() {
        flush_rewrite_rules();
    }

    function includes() {
        //include( plugin_dir_path( __FILE__) . 'includes/database.php' );
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
        add_shortcode( 'plugin-name', array( $this, 'plugin_api' ));
    }

    function register_callbacks() {

    }

    function register_scripts_stylesheets() {
        add_action( 'wp_enqueue_scripts', array( $this, 'custom_scripts' ));
        add_action( 'wp_enqueue_scripts', array( $this, 'custom_stylesheets' ));
    }

    function custom_scripts() {
        //wp_enqueue_script( 'tablesort', plugins_url( 'includes/jquery-tablesorter/jquery.tablesorter.min.js', __FILE__ ));
        //wp_enqueue_script( 'tablesort-widget', plugins_url( 'includes/jquery-tablesorter/jquery.tablesorter.widgets.min.js', __FILE__ ));
        //wp_enqueue_script( 'plugin-name-script', plugins_url( 'script.js', __FILE__ ));
    }

    function custom_stylesheets() {
        //wp_enqueue_style( 'plugin-name-style', plugins_url('style.css', __FILE__) );
    }

    function plugin_api( $atts, $content = null ) {

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

?>
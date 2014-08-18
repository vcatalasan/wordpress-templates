<?php

class PluginName {

    var $version = '0.0.1';

    // plugin general initialization

    private static $instance = null;

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
        // register plugin
        register_activation_hook( __FILE__, array( &$this, 'activate' ) ); // plugin activation actions
        register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );

        // register shortcodes
        self::register_shortcodes();
    }

    /**
     * Activation hook for the plugin.
     */
    function activate() {
        $this->includes();

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

    // plugin custom codes

    function register_shortcodes() {

    }


}

?>
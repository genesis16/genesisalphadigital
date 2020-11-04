<?php

defined( 'ABSPATH' ) || exit;

/**
 * Deactivate the free version
 */

if ( ! function_exists( 'wpbean_deactive_free_version' ) ) {
    function wpbean_deactive_free_version( $to_deactive, $to_active ) {

        if ( ! function_exists( 'is_plugin_active' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }

        if ( defined( $to_deactive ) && is_plugin_active( constant( $to_deactive ) ) ) {
            deactivate_plugins( constant( $to_deactive ) );
            
             if( ! function_exists( 'wp_create_nonce' ) ){
                header( 'Location: plugins.php');
                exit();
            }


            global $status, $page, $s;
            $redirect    = 'plugins.php?action=activate&plugin=' . $to_active . '&plugin_status=' . $status . '&paged=' . $page . '&s=' . $s;
            $redirect    = esc_url_raw( add_query_arg( '_wpnonce', wp_create_nonce( 'activate-plugin_' . $to_active ), $redirect ) );

            header( 'Location: ' . $redirect );
            exit();
        }
    }
}
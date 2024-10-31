<?php

namespace Pagup\Pixel\Controllers;

use  Pagup\Pixel\Core\Option ;
use  Pagup\Pixel\Core\Plugin ;
use  Pagup\Pixel\Core\Request ;
class SettingsController
{
    public function page()
    {
        $safe = [ "remove_settings", "pfws-settings", "pfws-faq" ];
        $success = "";
        
        if ( isset( $_POST['update'] ) ) {
            if ( function_exists( 'current_user_can' ) && !current_user_can( 'manage_options' ) ) {
                die( 'Sorry, not allowed...' );
            }
            check_admin_referer( 'pfws__settings', 'pfws__nonce' );
            if ( !isset( $_POST['pfws__nonce'] ) || !wp_verify_nonce( $_POST['pfws__nonce'], 'pfws__settings' ) ) {
                die( 'Sorry, not allowed. Nonce doesn\'t verify' );
            }
            $options = [
                'facebook_pixel_id' => ( Request::check( 'facebook_pixel_id' ) ? sanitize_text_field( $_POST['facebook_pixel_id'] ) : '' ),
                'twitter_pixel_id'  => ( Request::check( 'twitter_pixel_id' ) ? sanitize_text_field( $_POST['twitter_pixel_id'] ) : '' ),
                'remove_settings'   => Request::post( 'remove_settings', $safe ),
            ];
            update_option( 'pfws', $options );
            // update options
            $success = '<div class="notice pfws-notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.', 'bigta' ) . '</strong></p></div>';
        }
        
        $options = new Option();
        $text_domain = Plugin::domain();
        $notification = new \Pagup\Pixel\Controllers\NotificationController();
        echo  $notification->support() ;
        if ( !class_exists( '\\Google\\Web_Stories\\Plugin' ) ) {
            echo  $notification->webstories() ;
        }
        //set active class for navigation tabs
        $active_tab = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $safe ) ? sanitize_key( $_GET['tab'] ) : 'pfws-settings' );
        //Plugin::dd($_POST["remove_settings"]);
        //var_dump(Option::all());
        // purchase notification
        $purchase_url = "options-general.php?page=pixel-for-web-stories-pricing";
        $get_pro = sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', $text_domain ), array(
            'a' => array(
            'href'   => array(),
            'target' => array(),
        ),
        ) ), esc_url( $purchase_url ) );
        // Return Views
        if ( $active_tab == 'pfws-settings' ) {
            return Plugin::view( 'settings', compact(
                'active_tab',
                'options',
                'text_domain',
                'get_pro',
                'success',
                'notification'
            ) );
        }
        if ( $active_tab == 'pfws-faq' ) {
            return Plugin::view( "faq", compact( 'active_tab' ) );
        }
    }

}
$settings = new SettingsController();
<?php

/*
* Plugin Name: Pixel for Web Stories
* Description: Pixel for Web Stories (Google) allows you to (re)add easily your tracking codes |Pixel  (Facebook, Linkedin, Pinterest, Tiktok, Twitter, Yandex, Snapchat) to your Amp stories (now called Google Web stories).
* Author: Pagup
* Version: 1.0.5
* Author URI: https://pagup.ca/
* Text Domain: pixel-for-web-stories
* Domain Path: /languages/
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'pfws__fs' ) ) {
    pfws__fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'pfws__fs' ) ) {
        if ( !defined( 'PFWS_PLUGIN_BASE' ) ) {
            define( 'PFWS_PLUGIN_BASE', plugin_basename( __FILE__ ) );
        }
        require 'vendor/autoload.php';
        /******************************************
                           Freemius Init
           *******************************************/
        function pfws__fs()
        {
            global  $pfws__fs ;
            
            if ( !isset( $pfws__fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $pfws__fs = fs_dynamic_init( array(
                    'id'              => '7045',
                    'slug'            => 'pixel-for-web-stories',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_44c0b513934e896f0c8b3cc5eee2a',
                    'is_premium'      => false,
                    'premium_suffix'  => 'PRO',
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                    'days'               => 7,
                    'is_require_payment' => true,
                ),
                    'has_affiliation' => 'all',
                    'menu'            => array(
                    'slug'       => 'pixel-for-web-stories',
                    'first-path' => 'options-general.php?page=pixel-for-web-stories',
                    'support'    => false,
                    'parent'     => array(
                    'slug' => 'options-general.php',
                ),
                ),
                    'is_live'         => true,
                ) );
            }
            
            return $pfws__fs;
        }
        
        // Init Freemius.
        pfws__fs();
        // Signal that SDK was initiated.
        do_action( 'pfws__fs_loaded' );
        function pfws__fs_settings_url()
        {
            // if ( class_exists( '\Google\Web_Stories\Plugin' ) )
            // {
            //     return admin_url( 'edit.php?post_type=web-story&page=pfws' );
            // }
            // else {
            //     return admin_url( 'options-general.php?page=pfws' );
            // }
            return admin_url( 'options-general.php?page=pixel-for-web-stories' );
        }
        
        pfws__fs()->add_filter( 'connect_url', 'pfws__fs_settings_url' );
        pfws__fs()->add_filter( 'after_skip_url', 'pfws__fs_settings_url' );
        pfws__fs()->add_filter( 'after_connect_url', 'pfws__fs_settings_url' );
        pfws__fs()->add_filter( 'after_pending_connect_url', 'pfws__fs_settings_url' );
    }
    
    // freemius opt-in
    function pfws__fs_custom_connect_message(
        $message,
        $user_first_name,
        $product_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        $break = "<br><br>";
        $more_plugins = '<p><a target="_blank" href="https://wordpress.org/plugins/meta-tags-for-seo/">Meta Tags for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/automatic-internal-links-for-seo/">Auto internal links for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-alt-text-with-yoast/">Bulk auto image Alt Text</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-title-attribute/">Bulk auto image Title Tag</a>, <a target="_blank" href="https://wordpress.org/plugins/mobilook/">Mobile view</a>, <a target="_blank" href="https://wordpress.org/plugins/better-robots-txt/">Wordpress Better-Robots.txt</a>, <a target="_blank" href="https://wordpress.org/plugins/wp-google-street-view/">Wp Google Street View</a>, <a target="_blank" href="https://wordpress.org/plugins/vidseo/">VidSeo</a>, ...</p>';
        return sprintf( esc_html__( 'Hey %1$s, %2$s Click on Allow & Continue to install your tracking codes (Pixel) from Facebook, Linkedin, Pinterest, Tiktok, Twitter, Yandex, Snapchat to your Google Web stories and track your audience. %2$s Never miss an important update -- opt-in to our security and feature updates notifications. %2$s See you on the other side.', 'bulk-image-title-attribute' ), $user_first_name, $break ) . $more_plugins;
    }
    
    pfws__fs()->add_filter(
        'connect_message',
        'pfws__fs_custom_connect_message',
        10,
        6
    );
    class PixelForWebStories
    {
        function __construct()
        {
            register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );
            add_action( 'init', array( &$this, 'pfws__textdomain' ) );
        }
        
        public function deactivate()
        {
            if ( \Pagup\Pixel\Core\Option::check( 'remove_settings' ) ) {
                delete_option( 'pfws' );
            }
        }
        
        function pfws__textdomain()
        {
            load_plugin_textdomain( \Pagup\Pixel\Core\Plugin::domain(), false, basename( dirname( __FILE__ ) ) . '/languages' );
        }
    
    }
    $pfws = new PixelForWebStories();
    /*-----------------------------------------
                    TRACK CONTROLLER
      ------------------------------------------*/
    require_once \Pagup\Pixel\Core\Plugin::path( 'admin/controllers/TrackingController.php' );
    /*-----------------------------------------
                      Settings
      ------------------------------------------*/
    if ( is_admin() ) {
        include_once \Pagup\Pixel\Core\Plugin::path( 'admin/Settings.php' );
    }
}


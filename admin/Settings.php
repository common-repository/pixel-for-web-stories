<?php
namespace Pagup\Pixel;
use Pagup\Pixel\Core\Asset;

class Settings {

    public function __construct()
    {

        add_action( 'admin_menu', array( &$this, 'options_page' ) );

        $plugin_base = PFWS_PLUGIN_BASE;
        add_filter( "plugin_action_links_{$plugin_base}", array( &$this, 'setting_link' ) );
        
        add_action( 'admin_enqueue_scripts', array( &$this, 'assets') );

    }

    public function options_page()
    {
        
        $settings = new \Pagup\Pixel\Controllers\SettingsController;

        // if ( class_exists( '\Google\Web_Stories\Plugin' ) )
        // {
        //     add_submenu_page(
        //         'edit.php?post_type=web-story',
        //         'Pixel for Web Stories Settings',
        //         'Pixel for Web Stories',
        //         'manage_options',
        //         'pfws',
        //         array( &$settings, 'page' )
        //     );
        // } else {
        //     add_options_page(
        //         'Pixel for Web Stories Settings',
        //         'Pixel for Web Stories',
        //         'manage_options',
        //         'pfws',
        //         array( &$settings, 'page' )
        //     );
        // }

        add_options_page(
            'Pixel for Web Stories Settings',
            'Pixel for Web Stories',
            'manage_options',
            'pixel-for-web-stories',
            array( &$settings, 'page' )
        );

    }

    public function setting_link( $links ) {

        // if ( class_exists( '\Google\Web_Stories\Plugin' ) )
        // {
        //     array_unshift( $links, '<a href="edit.php?post_type=web-story&page=pfws">Settings</a>' );
        // } 
        // else {
        //     array_unshift( $links, '<a href="options-general.php?page=pfws">Settings</a>' );
        // }

        array_unshift( $links, '<a href="options-general.php?page=pixel-for-web-stories">Settings</a>' );

        return $links;
    }

    public function assets() {

        Asset::style_remote('pfws__font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
        Asset::style('pfws__flexboxgrid', 'flexboxgrid.min.css');
        Asset::style('pfws__styles', 'app.css');
        Asset::script('pfws__script', 'app.js');
    
    }
}

$settings = new Settings;
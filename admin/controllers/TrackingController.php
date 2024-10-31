<?php

namespace Pagup\Pixel\Controllers;

use  Pagup\Pixel\Core\Option ;
class TrackingController
{
    public function __construct()
    {
        add_action( 'web_stories_print_analytics', array( &$this, 'pixel' ) );
    }
    
    public function pixel()
    {
        $content = '';
        if ( Option::check( 'facebook_pixel_id' ) ) {
            $content .= $this->facebook( Option::get( 'facebook_pixel_id' ) );
        }
        if ( Option::check( 'twitter_pixel_id' ) ) {
            $content .= $this->twitter( Option::get( 'twitter_pixel_id' ) );
        }
        echo  $content ;
    }
    
    protected function facebook( $pixel_id )
    {
        return "<script type='text/javascript'>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '{$pixel_id}');fbq('track', 'PageView');</script>";
    }
    
    protected function twitter( $pixel_id )
    {
        return "<script src='//platform.twitter.com/oct.js' type='text/javascript'></script> <script type='text/javascript'>twttr.conversion.trackPid('{$pixel_id}', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>";
    }
    
    protected function linkedin( $pixel_id )
    {
        return;
    }
    
    protected function pinterest( $pixel_id )
    {
        return;
    }
    
    protected function tiktok( $pixel_id )
    {
        return;
    }
    
    protected function yandex( $pixel_id )
    {
        return;
    }
    
    protected function snapchat( $pixel_id )
    {
        return;
    }
    
    protected function google( $pixel_id )
    {
        return;
    }

}
$TrackingControllers = new TrackingController();
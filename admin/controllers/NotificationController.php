<?php
namespace Pagup\Pixel\Controllers;

use Pagup\Pixel\Core\Plugin;

require Plugin::path('vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php');

class NotificationController
{
    public function support() 
    {

        $text_domain = Plugin::domain();
        
        if ( ! \PAnD::is_admin_notice_active( 'bigta-rating-120' ) ) 
        {
            return;
        }

        return Plugin::view('notices/support', compact('text_domain'));
    }

    public function webstories() 
    {

        $text_domain = Plugin::domain();

        return Plugin::view('notices/webstories', compact('text_domain'));
    }
    
    public function pro() 
    {

        $text_domain = Plugin::domain();

        return Plugin::view('notices/pro', compact('text_domain'));
    }
}
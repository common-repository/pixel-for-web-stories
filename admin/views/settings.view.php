<div class="wrap container-fluid pfws-container">

    <div class="row">

        <div class="col-xs-12 col-md-9 pfws-main">

        <div class="pfws-segment bg-gray">
            <div class="row" style="margin-top: 0;">
                <p style="margin: 0; font-weight: 500">In essence, while AMP stories (Accelerated Mobile Pages stories) now called Web Stories are similar to generic HTML pages, the AMP framework clears away any custom JavaScript, the majority of CSS styling, Widgets and Plugins (including  scripts/tracking codes), thus making pages and posts load almost instantly. Meaning that you have to (re)add your tracking codes (Google, Facebook, Twitter, ...) properly to track your audience. Please enter all your IDs to allow conversion tracking of your Web stories from your preferred social networks.</p>
            </div>
        </div>

            <h2 class="pfws-heading">Settings</h2>

            <?php 
if ( isset( $success ) ) {
    echo  $success ;
}
?>

            <form method="post" class="pfws-form">

                <?php 
if ( function_exists( 'wp_nonce_field' ) ) {
    wp_nonce_field( 'pfws__settings', 'pfws__nonce' );
}
?>

                <div class="pfws-segment">

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="facebook_pixel_id">
                                <?php 
echo  __( 'Facebook Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">
                            <input type="text" id="facebook_pixel_id" class="pfws-input" name="facebook_pixel_id" value="<?php 
if ( $options::check( 'facebook_pixel_id' ) ) {
    echo  $options::get( 'facebook_pixel_id' ) ;
}
?>" placeholder="Enter your Facebook Pixel Tracking ID"/>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Facebook Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://www.facebook.com/business/help/952192354843755' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="twitter_pixel_id">
                                <?php 
echo  __( 'Twitter Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">
                            <input type="text" id="twitter_pixel_id" class="pfws-input" name="twitter_pixel_id" value="<?php 
if ( $options::check( 'twitter_pixel_id' ) ) {
    echo  $options::get( 'twitter_pixel_id' ) ;
}
?>" placeholder="Enter your Twitter Pixel Tracking ID"/>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Twitter Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://business.twitter.com/en/help/campaign-measurement-and-analytics/conversion-tracking-for-websites.html' ) ) ;
?></p>
                        </div>

                    </div>

                    <?php 
?>
                        <hr style="margin-top: 20px;" />
                    <?php 
?>

                    <div class="row">

                        <div class="col-xs-12">
                        <?php 
?>
                            <div class="pfws-alert pfws-info">
                                <span class="closebtn">&times;</span> 
                                <?php 
echo  $get_pro . " " . __( 'Linkedin, Pinterest, Tiktok, Yandex, Snapchat and Google Tag Manager tracking.', $text_domain ) ;
?>
                            </div>
                        <?php 
?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="linkedin_pixel_id">
                                <?php 
echo  __( 'Linkedin Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="linkedin_pixel_id" class="pfws-input pfws-disabled" placeholder="Enter your Linkedin Pixel Tracking ID" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Linkedin Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://www.linkedin.com/help/lms/answer/65521' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="pinterest_pixel_id">
                                <?php 
echo  __( 'Pinterest Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="pinterest_pixel_id" class="pfws-input pfws-disabled" placeholder="Enter your Pinterest Pixel Tracking ID" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Pinterest Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://help.pinterest.com/en/business/article/base-code' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="tiktok_pixel_id">
                                <?php 
echo  __( 'Tiktok Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="tiktok_pixel_id" class="pfws-input pfws-disabled" placeholder="Enter your Tiktok Pixel Tracking ID" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Tiktok Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://ads.tiktok.com/help/article?aid=847965446909373431' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="yandex_pixel_id">
                                <?php 
echo  __( 'Yandex tag (Metrika) ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="yandex_pixel_id" class="pfws-input pfws-disabled" placeholder="Enter your Yandex.Metrica tag ID" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Yandex.Metrica Tag.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://yandex.com/support/metrica/quick-start.html' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="snapchat_pixel_id">
                                <?php 
echo  __( 'Snapchat Pixel ID', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="snapchat_pixel_id" class="pfws-input pfws-disabled" placeholder="Enter your Snapchat Pixel Tracking ID" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Snapchat Pixel.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://businesshelp.snapchat.com/en-US/article/snap-pixel-about' ) ) ;
?></p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <label class="label" for="google_tag_id">
                                <?php 
echo  __( 'Google Tag Manager (AMP tag only)', $text_domain ) ;
?>
                            </label>
                        </div>

                        <div class="col-xs-8">

                            <?php 
?>

                                <input type="text" id="google_tag_id" class="pfws-input pfws-disabled" placeholder="Enter your Google Tag Manager ID (GTM-XXXXXX)" disabled />

                            <?php 
?>

                            <p class="pfws-comment"><?php 
echo  sprintf( wp_kses( __( 'Please check <a href="%s" target="_blank">here</a> to learn how to create a Google Tag Manager ID.', 'wp-google-street-view' ), array(
    'a' => array(
    'href'   => array(),
    'target' => array(),
),
) ), esc_url( 'https://support.google.com/tagmanager/answer/6103696' ) ) ;
?></p>
                        </div>

                    </div>
            
                </div>
                
                <div class="pfws-segment">
            
                    <div class="row">

                        <div class="col-xs-2">
                            <label class="label" for="remove_settings">
                                <?php 
echo  __( 'Remove Settings', $text_domain ) ;
?>
                            </label>
                        </div>
            
                        <div class="col-xs-2">
                            <label class="toggle"><input id="remove_settings" type="checkbox" name="remove_settings" value="remove_settings"
                            <?php 
if ( $options::check( 'remove_settings' ) ) {
    echo  'checked' ;
}
?> />
                            <span class='toggle-slider toggle-round'></span></label>
                        </div>
            
                        <div class="col-xs-8 field">
                            <input type="submit" name="update" class="pfws-submit" value="<?php 
echo  esc_html__( 'Save Changes', $text_domain ) ;
?>" />
                        </div>
            
                    </div>
                
                </div>
            
            </form>

        </div>

        <div class="col-xs-12 col-md-3 first-md pfws-side">

            <?php 
Pagup\Pixel\Core\Plugin::view( 'inc/side', compact( 'active_tab' ) );
?>

        </div>
    
    </div>

</div>
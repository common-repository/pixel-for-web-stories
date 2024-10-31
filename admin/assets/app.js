jQuery(document).ready(function () {

    jQuery('.pfws-alert').on('click', '.closebtn', function () {
        jQuery(this).closest('.pfws-alert').fadeOut(); //.css('display', 'none');
    });

    jQuery("#fs_connect button[type=submit]").on("click", function(e) {
        console.log("open verify window")
        window.open('https://better-robots.com/subscribe.php?plugin=pixel-for-web-stories','pixel-for-web-stories','resizable,height=400,width=700');
    });

});
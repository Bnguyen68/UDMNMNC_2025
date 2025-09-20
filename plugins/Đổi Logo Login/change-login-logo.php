<?php
/*
Plugin Name: Change Login Logo
Description: Đổi logo trang đăng nhập WordPress.
Version: 1.0
Author: BinhNguyen
*/

add_action('login_head', function() {
    ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo.png');
            background-size: contain;
            width: 120px;
            height: 120px;
        }
    </style>
    <?php
});

add_filter('login_headerurl', function() {
    return home_url();
});

add_filter('login_headertext', function() {
    return 'Trang chủ Kinh Đô Bakery';
});
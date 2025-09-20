<?php
// Setup theme
function udmnm_setup() {
    // Hỗ trợ tính năng cơ bản
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('woocommerce');

    // Đăng ký menu điều hướng
    register_nav_menus(array(
        'primary' => __('Main Menu', 'udmnm-2025')
    ));

    // Đa ngôn ngữ
    load_theme_textdomain('udmnm-2025', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'udmnm_setup');

// Enqueue styles and scripts
function udmnm_enqueue() {
    // Nạp file style.css mặc định
    wp_enqueue_style('udmnm-style', get_stylesheet_uri(), array(), '1.0');

    // Nạp file custom.css (tuỳ chỉnh của bạn, nằm cùng thư mục với style.css)
    wp_enqueue_style('udmnm-custom', get_template_directory_uri() . '/custom.css', array('udmnm-style'), '1.0');

    // Nạp file JS
    wp_enqueue_script('udmnm-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'udmnm_enqueue');

// WooCommerce: Cập nhật số lượng giỏ hàng động
add_filter('woocommerce_add_to_cart_fragments', 'udmnm_cart_fragment');
function udmnm_cart_fragment($fragments) {
    ob_start(); ?>
    <span class="cart-count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
    <?php
    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
}

// Plugin đổi logo đăng nhập 
function custom_login_logo() {
    ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo.png');
            background-size: contain;
            width: 120px;
            height: 120px;
            display: block;
        }
    </style>
    <?php
}
add_action('login_head', 'custom_login_logo');
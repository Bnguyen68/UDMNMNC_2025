<?php
/**
 * Header template for udmnm_2025 - Chuẩn Kinh Đô Bakery
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <!-- Lineicons CDN -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header chính - dính trên cùng -->
<header class="main-header-bg">
    <div class="header-inner">
        <!-- Logo thương hiệu -->
        <div class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <!-- Upload logo.png vào thư mục images/ -->
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Kinh Do Bakery" />
            </a>
        </div>
        <!-- Thanh search sản phẩm -->
        <form class="header-search-bar" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <select name="product_cat" class="dropdown">
                <option value="">Tất cả</option>
                <?php
                // Tự động liệt kê danh mục sản phẩm từ WooCommerce
                $categories = get_terms('product_cat');
                foreach ($categories as $category) {
                    echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
                }
                ?>
            </select>
            <input type="text" name="s" placeholder="Tìm kiếm..." />
            <input type="hidden" name="post_type" value="product" /> <!-- Chỉ tìm sản phẩm -->
            <button type="submit">Search</button>
        </form>
        <!-- Các icon (giỏ hàng, tài khoản) -->
        <div class="header-icons">
            <!-- Icon giỏ hàng + số lượng -->
            <a href="<?php echo wc_get_cart_url(); ?>" class="header-icon-wrap cart" title="Giỏ hàng">
                <svg width="35" height="35" fill="#fff" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-9.83-1.25l.03.05C7.23 17.53 7.6 18 8.09 18H19v-2H8.42l-.53-1H18c.78 0 1.48-.55 1.71-1.33l3.58-10.59A1.003 1.003 0 0 0 21.59 2H5.21l-.94-2H0v2h2l3.6 7.59-1.35 2.44C3.52 12.37 4.48 14 6.09 14H19v-2H6.42l1.1-2h7.45z"/></svg>
                <span class="cart-count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
            </a>
            <!-- Icon tài khoản -->
            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="header-icon-wrap user" title="Đăng kí/Đăng nhập">
                <svg width="35" height="35" fill="#fff" viewBox="0 0 24 24"><path d="M12 12c2.67 0 8 1.34 8 4v4H4v-4c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                <span class="user-label">Đăng kí/Đăng nhập</span>
            </a>
        </div>
    </div>
    <!-- Menu điều hướng chính -->
    <nav class="main-menu-wrap">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'main-menu'
        ]);
        ?>
    </nav>
</header>

<!-- Bắt đầu nội dung trang -->
<div class="site-content">

<!-- Hiệu ứng header đổi màu khi cuộn -->
<script>
window.addEventListener('scroll', function() {
  var header = document.querySelector('.main-header-bg');
  if(window.scrollY > 6) {
    header.classList.add('header-scrolled');
  } else {
    header.classList.remove('header-scrolled');
  }
});
</script>
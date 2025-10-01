<?php get_header(); ?>

<!-- Banner - sử dụng shortcode slider -->
<section class="banner">
    <?php echo do_shortcode('[smartslider3 slider="3"]'); ?>
</section>

<!-- Section sản phẩm Bánh Trung Thu -->
<section class="products-section">
    <div class="section-header custom-section-header">
        <span class="section-title">Bánh Trung Thu</span>
        <a class="section-all" href="<?php echo esc_url(get_term_link('banh-trung-thu', 'product_cat')); ?>">Tất cả</a>
    </div>
    <div class="product-list">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 5,
            'product_cat'    => 'banh-trung-thu'
        );
        $products = new WP_Query($args);
        if ($products->have_posts()) :
            while ($products->have_posts()) : $products->the_post();
                global $product;
        ?>
            <div class="product-card">
                <a href="<?php the_permalink(); ?>">
                    <?php echo woocommerce_get_product_thumbnail('woocommerce_single'); ?>
                    <h3 class="product-title"><?php the_title(); ?></h3>
                    <div class="product-rating">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                    <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                </a>
            </div>
        <?php endwhile; wp_reset_postdata(); else: ?>
            <p>Chưa có sản phẩm nào trong danh mục này.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Section sản phẩm OREO -->
<section class="products-section">
    <div class="section-header custom-section-header oreo-header">
        <span class="section-title">OREO</span>
        <a class="section-all" href="<?php echo esc_url(get_term_link('oreo', 'product_cat')); ?>">Tất cả</a>
    </div>
    <div class="product-list">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 5,
            'product_cat'    => 'oreo'
        );
        $products = new WP_Query($args);
        if ($products->have_posts()) :
            while ($products->have_posts()) : $products->the_post();
                global $product;
        ?>
            <div class="product-card">
                <a href="<?php the_permalink(); ?>">
                    <?php echo woocommerce_get_product_thumbnail('woocommerce_single'); ?>
                    <h3 class="product-title"><?php the_title(); ?></h3>
                    <div class="product-rating">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                    <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                </a>
            </div>
        <?php endwhile; wp_reset_postdata(); else: ?>
            <p>Chưa có sản phẩm nào trong danh mục này.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Section các lợi ích/ưu điểm -->
<section class="benefit-section">
  <div class="benefit-list">
    <div class="benefit-item">
      <i class="lni lni-rocket benefit-icon"></i>
      <div class="benefit-text">
        Chiết khấu cho đại lý, siêu thị, tạp hóa, khách sỉ từ 5 thùng trở lên
      </div>
    </div>
    <div class="benefit-item">
      <i class="lni lni-reload benefit-icon"></i>
      <div class="benefit-text">
        Giao hàng miễn phí đối với các đơn từ 2 triệu trở lên tại 1 Huế (liên hệ hotline 0234-3822813) trừ dòng bánh trung thu và quà tết
      </div>
    </div>
    <div class="benefit-item">
      <i class="lni lni-credit-cards benefit-icon"></i>
      <div class="benefit-text">
        <span class="benefit-title">Thanh toán an toàn</span><br>
        <span class="benefit-desc">100% Thanh toán an toàn</span>
      </div>
    </div>
    <div class="benefit-item">
      <i class="lni lni-support benefit-icon"></i>
      <div class="benefit-text">
        <span class="benefit-title">24/7 Hỗ trợ</span><br>
        <span class="benefit-desc">Hỗ trợ tận tâm</span>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
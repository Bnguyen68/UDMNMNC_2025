<?php get_header(); ?>
<section class="banner">
    <?php echo do_shortcode('[smartslider3 slider=1]'); // Slider plugin, tạo slider với hình bánh Trung Thu trước ?>
    <h1><?php _e('Bánh Trung Thu Kinh Đô 2025 & Hộp Quà Tết', 'udmnm-2025'); ?></h1>
    <p><?php _e('Bánh AFC, Cosy, Solite, Slide, Oreo, Bánh mì. Giá Tốt, chiết khấu ưu đãi.', 'udmnm-2025'); ?></p>
</section>
<section class="products-section">
    <?php
    $args = array(
        'post_type' => array('san-pham', 'product'), // CPT + Woo
        'posts_per_page' => 12, // Hiển thị tối đa 12 sản phẩm
        'tax_query' => array(
            array(
                'taxonomy' => 'danh-muc', // Taxonomy đã tạo trong functions.php
                'field' => 'slug', // Sử dụng slug để lọc
                'terms' => 'solite' // Lọc sản phẩm thuộc danh mục "Solite"
            )
        )
    );
    $products = new WP_Query($args);
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
    ?>
        <div class="product-card">
            <?php the_post_thumbnail('medium'); ?>
            <h3><?php the_title(); ?></h3>
            <p class="price"><?php echo get_post_meta(get_the_ID(), '_price', true) ? get_post_meta(get_the_ID(), '_price', true) . ' VND' : 'Liên hệ'; ?></p>
            <p class="chiet-khau"><?php echo get_field('chiet_khau') ?: 'Chiết khấu cho đại lý từ 5 thùng'; ?></p>
            <button class="add-to-cart" data-product-id="<?php the_id(); ?>">Thêm vào giỏ</button>
        </div>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    <?php echo do_shortcode('[gallery ids="1,2,3"]'); // Gallery sản phẩm, upload ảnh trước ?>
</section>
<?php get_footer(); ?>
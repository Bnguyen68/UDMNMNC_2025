<?php get_header(); ?>

<!-- Section chi tiết bài viết tin tức -->
<section class="single-news-section" style="margin-top:110px;">
  <div class="single-news-container" style="max-width:1200px;margin:0 auto;">
    <!-- Tiêu đề bài viết -->
    <h1 class="news-title" style="font-size:2.3rem;font-weight:bold;color:#222;margin-bottom:24px;">
      <?php the_title(); ?>
    </h1>
    <!-- Nếu có ảnh đại diện thì hiển thị -->
    <?php if (has_post_thumbnail()) : ?>
      <div class="news-thumb" style="margin-bottom:32px;">
        <?php the_post_thumbnail('large', ['style' => 'width:100%;max-width:700px;height:auto;border-radius:12px;']); ?>
      </div>
    <?php endif; ?>
    <!-- Nội dung bài viết -->
    <div class="news-content" style="font-size:1.25rem;color:#444;">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
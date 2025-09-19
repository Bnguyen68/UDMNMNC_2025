<?php
/*
Template Name: Tin tức Grid
*/
get_header();
?>

<section class="news-grid-section">
  <!-- Tiêu đề TIN TỨC canh giữa -->
  <div class="news-page-title">TIN TỨC</div>
  <div class="news-grid-list">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => $paged
    );
    $news_query = new WP_Query($args);
    if ($news_query->have_posts()):
      while ($news_query->have_posts()): $news_query->the_post();
    ?>
    <div class="news-card">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('large', ['class' => 'news-card-img']);
        } else {
          echo '<div class="news-card-img" style="background:#f3f3f3;"></div>';
        } ?>
      </a>
      <div class="news-card-content">
        <a href="<?php the_permalink(); ?>" style="color:#222;text-decoration:none;">
          <h3><?php the_title(); ?></h3>
        </a>
        <div style="display:flex;align-items:center;gap:8px;color:#a32c2c;margin-top:auto;">
          <span>
            <svg width="24" height="24" fill="none" stroke="#a32c2c" stroke-width="2" style="vertical-align:middle;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="4" stroke="#a32c2c" stroke-width="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke="#a32c2c"/><circle cx="8" cy="16" r="1.5" fill="#a32c2c"/><circle cx="12" cy="16" r="1.5" fill="#a32c2c"/><circle cx="16" cy="16" r="1.5" fill="#a32c2c"/></svg>
          </span>
          <span style="font-size:1.02rem;"><?php echo get_the_date('d/m/Y'); ?></span>
        </div>
      </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <!-- Phân trang nằm giữa, ngang -->
  <div class="news-pagination">
    <?php
      echo paginate_links([
        'total' => $news_query->max_num_pages,
        'current' => $paged,
        'type' => 'list',
        'prev_text' => '<svg style="vertical-align:middle;" width="22" height="22" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>',
        'next_text' => '<svg style="vertical-align:middle;" width="22" height="22" viewBox="0 0 24 24"><path d="M9 6l6 6-6 6"/></svg>'
      ]);
    ?>
  </div>
  <?php else: ?>
    <p style="text-align:center;">Chưa có bài viết nào.</p>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
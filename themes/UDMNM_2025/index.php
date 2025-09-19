<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
else :
    echo 'Không tìm thấy nội dung!';
endif;
get_footer();
?>


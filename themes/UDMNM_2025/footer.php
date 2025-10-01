</div> <!-- Đóng .site-content từ header.php -->

<!-- ========== Footer website bắt đầu ========== -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-grid">
            <!-- Cột 1: Văn phòng -->
            <div class="footer-column">
                <h3>Văn phòng</h3>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-office-menu',
                        'menu_class'     => 'footer-support-menu-list',
                        'container'      => false,
                    ));
                ?>
            </div>
            <!-- Cột 2: Liên hệ -->
            <div class="footer-column">
                <h3>Liên hệ</h3>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-contact-menu',
                        'menu_class'     => 'footer-support-menu-list',
                        'container'      => false,
                    ));
                ?>
            </div>
            <!-- Cột 3: Hướng dẫn và chính sách -->
            <div class="footer-column">
                <h3>Hướng dẫn và chính sách</h3>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-policy-menu',
                        'menu_class'     => 'footer-support-menu-list',
                        'container'      => false,
                    ));
                ?>
            </div>
            <!-- Cột 4: Đăng ký nhận tin -->
            <div class="footer-column">
                <h3>Đăng ký nhận tin</h3>
                <p>Nhập email của bạn để nhận thông tin ưu đãi</p>
                <form class="footer-newsletter-form" action="#" method="post">
                    <input type="email" name="newsletter_email" placeholder="Địa chỉ email" required>
                    <button type="submit">Đăng ký</button>
                </form>
            </div>
        </div>
        <hr style="margin: 36px 0 0 0;">
        <br>
        <p class="copyright">© 2025 Kinh Đô Bakery. All Rights Reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
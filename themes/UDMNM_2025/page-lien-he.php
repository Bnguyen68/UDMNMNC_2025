<?php
/*
Template Name: Liên hệ
*/
get_header();
?>
<section class="contact-section">
  <div class="contact-page-title">
    LIÊN HỆ
  </div>
  <div class="contact-content">
    <!-- Bản đồ Google Maps bên trái -->
    <div class="contact-map">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d521.5835943224974!2d107.5874978030701!3d16.457601236832854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a147ba6bdbff%3A0x2e605afab4951ad9!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEPDtG5nIG5naGnhu4dwIEh14bq_!5e0!3m2!1svi!2sus!4v1758265656506!5m2!1svi!2sus" 
        width="100%" height="320" style="border-radius:12px;border:1px solid #eee;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Form liên hệ bên phải -->
    <div class="contact-form-wrap">
      <div class="contact-title">
        <span class="contact-title-bold">
          QUÝ KHÁCH HÀNG CÓ THỂ LIÊN LẠC VỚI CHÚNG TÔI BẰNG CÁCH ĐIỀN ĐẦY ĐỦ THÔNG TIN VÀO MẪU SAU:
        </span>
      </div>
      <form action="#" method="post" class="contact-form">
        <input type="text" name="name" placeholder="Tên của bạn..." required>
        <input type="text" name="phone" placeholder="Số điện thoại..." required>
        <input type="text" name="address" placeholder="Địa chỉ..." required>
        <input type="email" name="email" placeholder="Email..." required>
        <textarea name="message" placeholder="Nội dung..." required></textarea>
        <button type="submit">Gửi thông tin</button>
      </form>
    </div>
  </div>
</section>
<?php get_footer(); ?>
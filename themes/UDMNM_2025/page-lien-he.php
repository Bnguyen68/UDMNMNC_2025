<?php
/*
Template Name: Liên hệ
*/
get_header();
?>
<section class="contact-section">
  <div class="section-header" style="text-align:center;">
    <span class="section-title" style="font-size:2.2rem;color:#b62828;font-weight:bold;letter-spacing:2px;">LIÊN HỆ</span>
  </div>
  <div class="contact-content" style="display:flex;justify-content:center;gap:48px;flex-wrap:wrap;align-items:flex-start;margin:48px 0;">
    <!-- Bản đồ Google Maps bên trái -->
    <div class="contact-map" style="flex:1;min-width:350px;max-width:600px;">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d521.5835943224974!2d107.5874978030701!3d16.457601236832854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a147ba6bdbff%3A0x2e605afab4951ad9!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEPDtG5nIG5naGnhu4dwIEh14bq_!5e0!3m2!1svi!2sus!4v1758265656506!5m2!1svi!2sus" 
        width="100%" height="320" style="border-radius:12px;border:1px solid #eee;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Form liên hệ bên phải -->
    <div class="contact-form-wrap" style="flex:1;min-width:350px;max-width:480px;">
      <div style="font-size:1.18rem;font-weight:bold;color:#444;margin-bottom:24px;">
        *QUÝ KHÁCH HÀNG CÓ THỂ LIÊN LẠC VỚI CHÚNG TÔI BẰNG<br>CÁCH ĐIỀN ĐẦY ĐỦ THÔNG TIN VÀO MẪU SAU:
      </div>
      <form action="#" method="post" class="contact-form" style="display:grid;grid-template-columns:1fr 1fr;gap:14px 16px;">
        <input type="text" name="name" placeholder="Tên của bạn..." required style="grid-column:1">
        <input type="text" name="phone" placeholder="Số điện thoại..." required style="grid-column:2">
        <input type="text" name="address" placeholder="Địa chỉ..." required style="grid-column:1">
        <input type="email" name="email" placeholder="Email..." required style="grid-column:2">
        <textarea name="message" placeholder="Nội dung..." required style="grid-column:1/3;height:88px;"></textarea>
        <button type="submit" style="grid-column:1/3;background:#b62828;color:#fff;font-weight:bold;padding:10px 0;border:none;border-radius:7px;font-size:1.12rem;cursor:pointer;margin-top:8px;">Gửi thông tin</button>
      </form>
    </div>
  </div>
</section>
<?php get_footer(); ?>
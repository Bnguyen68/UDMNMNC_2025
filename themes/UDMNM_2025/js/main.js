jQuery(document).ready(function($) {
    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id'); // Thêm data-product-id vào button
        $(this).text('Đã thêm vào giỏ!');
    });
});
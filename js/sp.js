// Chon size
$(document).on('click', '.add-to-cart a', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var listSize = $(this).closest('.sp1').find('.list-size');

    // Kiểm tra xem có lớp 'open' không
    if (listSize.hasClass('open')) {
        // Nếu có, loại bỏ lớp 'open' để tắt nó
        listSize.removeClass('open');
    } else {
        // Nếu không có, thêm lớp 'open' để mở nó
        listSize.addClass('open');
    }
});

// Khi click vào class "icon" (cụ thể là .item-cart > a)
$(document).on('click', '.item-cart > a', function (e) {
    e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ "a"
    
    const subAction = $(this).parent().find('.sub-action'); // Tìm phần tử "sub-action" trong phần tử cha của thẻ "a"
    
    if (subAction.hasClass('open')) {
        subAction.removeClass('open'); // Nếu có class "open", loại bỏ nó
    } else {
        subAction.addClass('open'); // Nếu không có class "open", thêm nó
    }
});

// Khi click vào class "action-close"
$(document).on('click', '.action-close', function () {
    $(this).parent().removeClass('open'); // Loại bỏ class "open" từ phần tử cha
});

// Khi click ra khỏi phần tử "sub-action" có class "open" hoặc bất kỳ nơi nào bên ngoài
$(document).on('click', function (e) {
    if (!$(e.target).closest('.sub-action.open').length && !$(e.target).closest('.item-cart > a').length) {
        $('.sub-action.open').removeClass('open'); // Loại bỏ class "open" từ tất cả các phần tử "sub-action" có class "open"
    }
});


// Chon size trang san pham
$(document).ready(function() {
    $('.fa-plus').on('click', function() {
        // Ẩn biểu tượng fa-plus
        $(this).hide();
        // Hiển thị biểu tượng fa-minus
        $(this).siblings('.fa-minus').show();
        // Hiển thị div có class "sub-list-side" với hiệu ứng
        $(this).closest('.item-side').find('.sub-list-side').slideDown('fast');
    });

    $('.fa-minus').on('click', function() {
        // Ẩn biểu tượng fa-minus
        $(this).hide();
        // Hiển thị biểu tượng fa-plus
        $(this).siblings('.fa-plus').show();
        // Ẩn div có class "sub-list-side" với hiệu ứng
        $(this).closest('.item-side').find('.sub-list-side').slideUp('fast');
    });
});



$('.item-sub-side .item-sub-title').on('click', function() {
    var checkbox = $(this).prev('.field-cat');
    if (!checkbox.prop('checked')) {
        checkbox.prop('checked', true);

        if ($(this).hasClass('quantity-live')) {
            checkbox.val(1);
        }
    } else {
        checkbox.prop('checked', false);

        if ($(this).hasClass('quantity-live')) {
            checkbox.val(0);
        }
    }
    
    $(this).toggleClass('active');
});


// Trượt giá 
$(document).ready(function() {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 10000000,
        values: [0, 10000000],
        slide: function(event, ui) {
            var fromValue = ui.values[0];
            var toValue = ui.values[1];

            // Chuyển đổi giá trị sang định dạng tiền tệ
            var fromFormatted = (fromValue).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
            var toFormatted = (toValue).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

            // Cập nhật giá trị cho input tương ứng
            $("input[name='product_price_from']").val(fromValue);
            $("input[name='product_price_to']").val(toValue);

            // Cập nhật hiển thị giá trị
            $("#amout-from").text(fromFormatted);
            $("#amout-to").text(toFormatted);
        }
    });
});
// chọn giảm giá
$(document).ready(function() {
    $('input[type="radio"]').change(function() {
        // Remove "active" class from all spans
        $('.item-sub-list span').removeClass('active');
        
        // Add "active" class to the selected span
        if ($(this).is(':checked')) {
            $(this).closest('label').find('span').addClass('active');
        }
    });
});

// 
$(document).ready(function() {
    $(".toggle-sort").click(function() {
        // Toggle the "open" class on item-filter and list-number-row
        $(".item-filter, .list-number-row").toggleClass("open");
    });
});
$(document).ready(function() {
    $(".sel-order-option").click(function() {
        var selectedText = $(this).text(); // Lấy văn bản từ thẻ 'a'
        $(".toggle-sort span").text(selectedText); // Cập nhật văn bản bên trong thẻ 'span'
    
        // Loại bỏ lớp "open" từ list-number-row và item-filter
        $(".list-number-row, .item-filter").removeClass("open");
    });
});

// click hiển thị ảnh tương ứng
$(document).ready(function() {
    // Lắng nghe sự kiện khi người dùng nhấp vào hình ảnh dưới
    $('.sp-doc-img').on('click', function() {
        // Lấy chỉ mục của hình ảnh dưới
        var index = $(this).data('slide-to');
        
        // Sử dụng Bootstrap Carousel để chuyển đến slide tương ứng
        $('#carouselExample').carousel(index);
    });
});

// số lượng sản phẩm 
$(document).ready(function() {
    var quantityInput = $("input[name='quantity']");
    var increaseButton = $(".product-detail__quantity--increase");
    var decreaseButton = $(".product-detail__quantity--decrease");

    increaseButton.on("click", function() {
        var currentValue = parseInt(quantityInput.val());
        var maxQuantity = parseInt(quantityInput.attr("max"));
        if (currentValue < maxQuantity) {
            quantityInput.val(currentValue + 1);
        }
    });

    decreaseButton.on("click", function() {
        var currentValue = parseInt(quantityInput.val());
        if (currentValue > 1) {
            quantityInput.val(currentValue - 1);
        }
    });
});

// Thông tin sản phẩm
$(document).ready(function() {
    // Add click event handler for the tab items
    $(".product-detail__tab .tab-item").on("click", function () {
        const itemIndex = $(this).index();

        // Remove the "active" class from all tab items and tab contents
        $(".product-detail__tab .tab-item").removeClass("active");
        $(".product-detail__tab .tab-content").removeClass("active");

        // Add the "active" class to the clicked tab item
        $(this).addClass("active");

        // Show the corresponding tab content
        $(".product-detail__tab .tab-content").eq(itemIndex).addClass("active");
    });

    // Add click event handler for the "show more" button
    $(".show-more a").on("click", function() {
        // Toggle the visibility of tab content
        $(".product-detail__tab-body .tab-content").toggleClass("showContent hideContent");

        // Toggle the visibility of up and down images
        $(".image-up, .image-down").toggleClass("showImg hideImg");
    });
});






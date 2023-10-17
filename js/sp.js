
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







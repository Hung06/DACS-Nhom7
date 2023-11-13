<?php
$htmlFilePath = '../html/index.html'; // Thay đổi đường dẫn này với đường dẫn thực tế

// Đọc nội dung của file HTML
$htmlContent = file_get_contents($htmlFilePath);

// Sử dụng thư viện DOMDocument để phân tích HTML
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($htmlContent);
libxml_clear_errors();

// Sử dụng XPath để lấy tất cả các phần tử có class "sp1"
$xpath = new DOMXPath($dom);
$sp1Elements = $xpath->query('//div[contains(@class, "sp1")]');

// Tạo một mảng để lưu trữ thông tin của các sản phẩm
$productArray = array();

// Duyệt qua từng phần tử "sp1"
foreach ($sp1Elements as $sp1) {
    // Lấy thông tin sản phẩm từ các phần tử HTML trong "sp1"
    $productInfo = array(
        'image' => $sp1->getElementsByTagName('img')->item(0)->getAttribute('src'),
        'title' => $sp1->getElementsByTagName('h3')->item(0)->nodeValue,
        'price' => $sp1->getElementsByTagName('span')->item(0)->nodeValue
    );

    // Thêm thông tin sản phẩm vào mảng
    $productArray[] = $productInfo;
}

// In ra thông tin của tất cả các sản phẩm
print_r($productArray);
?>

<?php
$flowers = [
    ["id" => uniqid(), "name" => "1. Dạ yến thảo", "description" => "Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở...", "img" => "imgs/dayenthao.webp"],
    ["id" => uniqid(), "name" => "2. Hoa đồng tiền", "description" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè...", "img" => "imgs/dongtien.webp"],
    ["id" => uniqid(), "name" => "3. Hoa giấy", "description" => "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta...", "img" => "imgs/giay.webp"],
    ["id" => uniqid(), "name" => "4. Hoa thanh tú", "description" => "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú...", "img" => "imgs/thanhtu.webp"],
    ["id" => uniqid(), "name" => "5. Hoa đèn lồng", "description" => "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ...", "img" => "imgs/denlong.webp"],
    ["id" => uniqid(), "name" => "6. Hoa cẩm chướng", "description" => "Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè...", "img" => "imgs/camchuong.webp"],
    ["id" => uniqid(), "name" => "7. Hoa huỳnh anh", "description" => "Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công...", "img" => "imgs/huynhanh.webp"],
    ["id" => uniqid(), "name" => "8. Hoa Păng-xê", "description" => "Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ...", "img" => "imgs/pangxe.webp"],
    ["id" => uniqid(), "name" => "9. Hoa sen", "description" => "Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện...", "img" => "imgs/sen.webp"],
    ["id" => uniqid(), "name" => "10. Hoa dừa cạn", "description" => "Hoa dừa cạn còn có các tên gọi như trường xuân hoa...", "img" => "imgs/duacan.webp"],
];

function save($flowers) {
    $data = json_encode($flowers);
    if (file_put_contents('flowers.json', $data) === false) {
        echo "Không thể lưu dữ liệu vào file flowers.json!";
        return false;
    }
    return true;
}

function load() {
    if (file_exists('flowers.json')) {
        $content = file_get_contents('flowers.json');
        if ($content === false) {
            echo "Không thể đọc file flowers.json!";
            return [];
        }
        return json_decode($content, true);
    }
    return [];
}

if (!file_exists('flowers.json')) {
    save($flowers);
}

$flowers = load();
?>

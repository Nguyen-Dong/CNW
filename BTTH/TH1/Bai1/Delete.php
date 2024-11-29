<?php
require 'SqlCon.php';      // Kết nối cơ sở dữ liệu
require 'FlowerModel.php'; // Gọi file xử lý Flower

// Khởi tạo đối tượng FlowerModel
$flowerModel = new FlowerModel($pdo);

if (isset($_GET['delete'])) {
    $FlowerID = $_GET['delete'];

    // Xóa hoa
    $flowerModel->deleteFlower($FlowerID);

    // Chuyển hướng về trang danh sách
    header("Location: index.php");
    exit;
} else {
    echo "ID không hợp lệ.";
    exit;
}
?>

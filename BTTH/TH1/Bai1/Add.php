<?php
require 'SqlCon.php';      // Kết nối cơ sở dữ liệu
require 'FlowerModel.php'; // Gọi file xử lý Flower

// Khởi tạo đối tượng FlowerModel
$flowerModel = new FlowerModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $FlowerName = $_POST['FlowerName'];
    $Info = $_POST['Info'];
    $Image = $_POST['Image'];

    // Thêm hoa vào cơ sở dữ liệu
    $flowerModel->addFlower($FlowerName, $Info, $Image);

    // Chuyển hướng về trang danh sách
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới hoa</title>
</head>
<body>
    <h1>Thêm mới hoa</h1>
    <form action="Add.php" method="POST">
        <label for="FlowerName">Tên hoa:</label>
        <input type="text" id="FlowerName" name="FlowerName" required><br><br>

        <label for="Info">Mô tả:</label>
        <textarea id="Info" name="Info" required></textarea><br><br>

        <label for="Image">Ảnh (URL):</label>
        <input type="text" id="Image" name="Image" required><br><br>

        <button type="submit">Thêm mới</button>
        <a href="index.php">Quay lại</a>
    </form>
</body>
</html>

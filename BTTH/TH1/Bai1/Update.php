<?php
require 'SqlCon.php';      // Kết nối cơ sở dữ liệu
require 'FlowerModel.php'; // Gọi file xử lý Flower

// Khởi tạo đối tượng FlowerModel
$flowerModel = new FlowerModel($pdo);

if (isset($_GET['Id'])) {
    $FlowerID = $_GET['Id'];

    // Lấy thông tin hoa hiện tại
    $flower = $pdo->prepare("SELECT * FROM Flower WHERE Id = ?");
    $flower->execute([$FlowerID]);
    $flower = $flower->fetch(PDO::FETCH_ASSOC);

    if (!$flower) {
        echo "Hoa không tồn tại.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $FlowerName = $_POST['FlowerName'];
        $Info = $_POST['Info'];
        $Image = $_POST['Image'];

        // Cập nhật hoa
        $flowerModel->updateFlower($FlowerID, $FlowerName, $Info, $Image);

        // Chuyển hướng về trang danh sách
        header("Location: index.php");
        exit;
    }
} else {
    echo "ID không hợp lệ.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật hoa</title>
</head>
<body>
    <h1>Cập nhật hoa</h1>
    <form action="Update.php?Id=<?= htmlspecialchars($FlowerID) ?>" method="POST">
        <label for="FlowerName">Tên hoa:</label>
        <input type="text" id="FlowerName" name="FlowerName" value="<?= htmlspecialchars($flower['FlowerName']) ?>" required><br><br>

        <label for="Info">Mô tả:</label>
        <textarea id="Info" name="Info" required><?= htmlspecialchars($flower['Info']) ?></textarea><br><br>

        <label for="Image">Ảnh (URL):</label>
        <input type="text" id="Image" name="Image" value="<?= htmlspecialchars($flower['Image']) ?>" required><br><br>

        <button type="submit">Cập nhật</button>
        <a href="index.php">Quay lại</a>
    </form>
</body>
</html>

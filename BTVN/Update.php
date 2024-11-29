<?php include("Header.php"); ?>

<?php
$filePath = 'Product.php'; // Đường dẫn file dữ liệu
$products = file_exists($filePath) ? include($filePath) : [];

// Lấy thông tin sản phẩm từ URL (GET)
$productName = $_GET['Name'] ?? '';
$productPrice = $_GET['price'] ?? '';

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['Name'] ?? '';
    $newPrice = $_POST['Price'] ?? '';
    $originalName = $_POST['originalName'] ?? '';

    // Cập nhật sản phẩm trong danh sách
    foreach ($products as &$product) {
        if ($product['Name'] === $originalName) {
            $product['Name'] = htmlspecialchars($newName);
            $product['price'] = htmlspecialchars($newPrice);
            break;
        }
    }

    // Ghi lại dữ liệu vào file
    file_put_contents($filePath, '<?php return ' . var_export($products, true) . ';');

    // Chuyển hướng về index.php
    header('Location: Demo.php');
    exit();
}
?>

<h2>Sửa sản phẩm</h2>
<form method="POST">
    <div class="form-group">
        <label for="Product">Tên sản phẩm</label>
        <input type="text" class="form-control" id="Name" name="Name" placeholder="Nhập tên sản phẩm" value="<?= htmlspecialchars($productName) ?>" required>
    </div>
    <div class="form-group">
        <label for="Price">Giá thành</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá" value="<?= htmlspecialchars($productPrice) ?>" required>
    </div>
    <!-- Truyền tên gốc của sản phẩm để xác định khi cập nhật -->
    <input type="hidden" name="originalName" value="<?= htmlspecialchars($productName) ?>">
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>

<?php include("Footer.php"); ?>

<?php include("Header.php"); ?>

<?php
// Nếu form được submit, lưu sản phẩm vào file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['Name'] ?? '';
    $productPrice = $_POST['price'] ?? '';

    // Đảm bảo các giá trị không rỗng
    if (!empty($productName) && !empty($productPrice)) {
        // Đọc dữ liệu hiện tại từ file
        $filePath = 'Product.php';
        $products = file_exists($filePath) ? include($filePath) : [];

        // Thêm sản phẩm mới vào mảng
        $products[] = [
            'Name' => htmlspecialchars($productName),
            'price' => htmlspecialchars($productPrice)
        ];

        // Ghi lại dữ liệu vào file
        file_put_contents($filePath, '<?php return ' . var_export($products, true) . ';');
        // Chuyển hướng về trang index
        header('Location: Demo.php');
        exit();
    }
}
?>

<h2>Thêm sản phẩm</h2>
<form id="productForm" method="POST">
    <div class="form-group">
        <label for="Product">Sản phẩm</label>
        <input type="text" class="form-control" id="Name" name="Name" placeholder="Nhập tên sản phẩm" required>
    </div>
    <div class="form-group">
        <label for="Price">Giá thành</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá" required>
    </div>
    <button type="submit" class="btn btn-primary" id="addButton">Thêm</button>
</form>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bắt sự kiện khi form được submit
        document.getElementById("addButton").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("productForm").submit(); // Submit form
        });
    });
</script>

<?php include("Footer.php"); ?>

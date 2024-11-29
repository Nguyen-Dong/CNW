<?php include("Header.php"); ?>
<?php include("Product.php"); ?>

<?php
// Đường dẫn file dữ liệu
$filePath = 'Product.php';

// Đọc danh sách sản phẩm
$products = file_exists($filePath) ? include($filePath) : [];

// Xử lý yêu cầu xóa sản phẩm
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $deleteName = $_GET['delete'];

    // Lọc bỏ sản phẩm có tên trùng với `$deleteName`
    $products = array_filter($products, function ($product) use ($deleteName) {
        return $product['Name'] !== $deleteName;
    });

    // Ghi lại danh sách vào file
    file_put_contents($filePath, '<?php return ' . var_export($products, true) . ';');

    // Chuyển hướng để tránh lặp lại hành động xóa khi tải lại trang
    header('Location: Demo.php');
    exit();
}
?>

<div class="container-xl" style="margin-top: 50px;">
    <div class="table-responsive">
        <div class="table-wrapper">
            <button type="button" class="btn btn-success" href="Add.php" id="addButton">Thêm mới</button>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá thành</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['Name']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?> VND</td>
                            <td>
                                <a href="Update.php?Name=<?= urlencode($product['Name']) ?>&price=<?= urlencode($product['price']) ?>" class="edit" data-bs-toggle="modal"><i class="material-icons"
                                        title="Edit">&#xE254;</i></a>
                            </td>
                            <td>
                                <a href="Demo.php?delete=<?= urlencode($product['Name']) ?>" class="delete" data-bs-toggle="modal"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    <i class="material-icons" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?php include('Footer.php'); ?>

<script>
    // Đảm bảo script chạy sau khi DOM đã tải xong
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("addButton").addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = "Add.php";
        });
    });
</script>
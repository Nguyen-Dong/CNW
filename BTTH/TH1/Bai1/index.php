<?php
include("Header.php");
require 'SqlCon.php'; // Gọi file kết nối CSDL
require 'FlowerModel.php';

// Khởi tạo đối tượng FlowerModel
$flowerModel = new FlowerModel($pdo);

// Lấy danh sách các loài hoa
$flowers = $flowerModel->getAllFlower();
?>

<div class="container-xl" style="margin-top: 50px;">
    <div class="table-responsive">
        <div class="table-wrapper">
            <a href="Add.php" class="btn btn-success" id="addButton">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên hoa</th>
                        <th scope="col" style="text-align:center">Mô tả</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($flowers as $flower): ?>
                        <tr>
                            <td><?= htmlspecialchars($flower['FlowerName']) ?></td>
                            <td><?= htmlspecialchars($flower['Info']) ?></td>
                            <td>
                                <img src="<?= htmlspecialchars($flower['Image']) ?>" alt="<?= htmlspecialchars($flower['FlowerName']) ?>" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <a href="Update.php?Id=<?= urlencode($flower['Id']) ?>" class="edit">
                                    <i class="material-icons" title="Edit">&#xE254;</i>
                                </a>
                            </td>
                            <td>
                                <a href="Delete.php?delete=<?= urlencode($flower['Id']) ?>" class="delete"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    <i class="material-icons" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

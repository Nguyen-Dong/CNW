
<?php
$host = 'localhost';        // Tên máy chủ
$dbname = 'BTTH1';      // Tên cơ sở dữ liệu
$username = 'root';         // Tài khoản MySQL
$password = '';             // Mật khẩu 

try {
    // Kết nối cơ sở dữ liệu bằng PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Thiết lập chế độ lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
?>
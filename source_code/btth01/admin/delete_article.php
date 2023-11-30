
<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

// Lấy ID từ dữ liệu gửi từ form
$id = $_GET['id'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM baiviet WHERE ma_bviet = $id";

    $conn->exec($sql);
    ?>
    <h1 class="text-center">
        Đã xóa bài viết
        <a href="index.php">Hãy quay lại trang chủ</a>
    </h1>
    <?php
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
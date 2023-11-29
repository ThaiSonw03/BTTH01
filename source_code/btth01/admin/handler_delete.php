<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

// Kiểm tra nếu có yêu cầu xóa từ form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_post'])) {
    $idToDelete = $_POST['ma_tloai'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sử dụng truy vấn DELETE để xóa bài viết với ID tương ứng
        $deleteSql = "DELETE FROM theloai WHERE ma_tloai = :id";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bindParam(':id', $idToDelete, PDO::PARAM_INT);
        $stmt->execute();

        // Hiển thị thông báo xóa thành công hoặc chuyển hướng đến trang khác
        echo "Xóa bài viết thành công!";
        // Hoặc chuyển hướng đến trang danh sách bài viết sau khi xóa
        // header("Location: list_posts.php");
        // exit();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>

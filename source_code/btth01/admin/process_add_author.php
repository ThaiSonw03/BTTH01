<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Đếm số lượng tác giả
$numbers = "SELECT COUNT(ma_tgia) as count FROM tacgia";
$quantityResult = $conn->query($numbers);
$result = $quantityResult->fetch(PDO::FETCH_ASSOC);
$quantity = $result['count'];


// Xử lý thêm tác giả
$autname = $_POST['txtAutName'];
$autimg = $_POST['txtAutImg'];

if (!empty($autname)) {
    $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES ($quantity + 1, '$autname', '$autimg')";

    try {
        $conn->exec($sql);
        ?>
        <h1 class="text-center">
            Đã thêm tác giả mới
            <a href="index.php">Hãy quay lại trang chủ</a>
        </h1>
        <?php
    } catch (PDOException $e) {
        echo "Lỗi khi thêm tác gỉa: " . $e->getMessage();
    }
} else {
    echo "Bạn chưa nhập thông tin cho tên tác giả mới";
}
?>

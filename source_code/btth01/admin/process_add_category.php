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

// Đếm số lượng thể loại
$numbers = "SELECT COUNT(ma_tloai) as count FROM theloai";
$quantityResult = $conn->query($numbers);
$result = $quantityResult->fetch(PDO::FETCH_ASSOC);
$quantity = $result['count'];


// Xử lý thêm thể loại mới
$catname = $_POST['txtCatName'];


if (!empty($catname)) {
    $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES ($quantity + 1, '$catname')";

    try {
        $conn->exec($sql);
        ?>
        <h1 class="text-center">
            Đã thêm bài hát mới
            <a href="index.php">Hãy quay lại trang chủ</a>
        </h1>
<?php
    } catch (PDOException $e) {
        echo "Lỗi khi thêm thể loại: " . $e->getMessage();
    }
} else {
    echo "Bạn chưa nhập thông tin cho tên loại bài hát mới";
}
?>

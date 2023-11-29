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

// Đếm số lượng bàài viiết
$numbers = "SELECT COUNT(ma_bviet) as count FROM baiviet";
$quantityResult = $conn->query($numbers);
$result = $quantityResult->fetch(PDO::FETCH_ASSOC);
$quantity = $result['count'];


// Xử lý thêm bài viết
$title = $_POST['txtTitle'];
$songname = $_POST['txtSongName'];
$idcate = $_POST['txtIdCate'];
$summary = $_POST['txtSummary'];
$content = $_POST['txtContent'];
$idaut = $_POST['txtIdAut'];
$date = $_POST['txtDate'];
$imgart = $_POST['txtImgArt'];

$isIdCate = "SELECT * FROM theloai WHERE ma_tloai = $idcate";
$resultCate = $conn->query($isIdCate);
$isIdAut = "SELECT * FROM tacgia WHERE ma_tgia = $idaut";
$resultAut = $conn->query($isIdAut);
if ($resultCate->rowCount() == 0 && $resultAut->rowCount() == 0){
    echo "Lỗi: Không tìm thấy ID củủa tác giả hoặc thể loại!";
}else {
    if (!empty($title) && !empty($summary) &&!empty($songname) &&!empty($content)) {
        $sql = "INSERT INTO baiviet(ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
                    VALUE ($quantity + 1, '$title', '$songname', '$idcate', '$summary', '$content', '$idaut', '$date', '$imgart')";

        try {
            $conn->exec($sql);
            ?>
          <h1 class="text-center">
            Đã thêm bài viết mới
            <a href="index.php">Hãy quay lại trang chủ</a>
          </h1>
            <?php
        } catch (PDOException $e) {
            echo "Lỗi khi thêm bài viết: " . $e->getMessage();
        }
    } else {
        echo "Bạn chưa nhập thông tin cho bài viết mới";
    }
}

?>

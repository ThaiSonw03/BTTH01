<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";
$title = $_POST['txtTitleUpdate'];
$songname = $_POST['txtSongNameUpdate'];
$idcate = $_POST['txtIdCateUpdate'];
$summary = $_POST['txtSummaryUpdate'];
$content = $_POST['txtContentUpdate'];
$idaut = $_POST['txtIdAutUpdate'];
$date = $_POST['txtDateUpdate'];
$imgart = $_POST['txtImgArtUpdate'];
$idArt = $_POST['txtArtId'];

$date  = date('Y-m-d H:i:s');


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}


$isIdCate = "SELECT * FROM theloai WHERE ma_tloai = $idcate";
$resultCate = $conn->query($isIdCate);
$isIdAut = "SELECT * FROM tacgia WHERE ma_tgia = $idaut";
$resultAut = $conn->query($isIdAut);
if ($resultCate->rowCount() == 0 && $resultAut->rowCount() == 0){
    echo "Lỗi: Không tìm thấy ID củủa tác giả hoặc thể loại!";
}else {
    if (!empty($title) && !empty($songname) && !empty($idcate) && !empty($idaut) ){
        $sql = "UPDATE baiviet
                SET tieude = '$title', ten_bhat = '$songname', ma_tloai = '$idcate', 
                    tomtat = '$summary', noidung = '$content', ma_tgia = '$idaut', ngayviet='$date', 
                    hinhanh= '$imgart' 
                WHERE ma_bviet = $idArt";

        try {
            $conn->exec($sql);
            ?>
          <h1 class="text-center">
            Đã sửa thông tin bài viết
            <a href="index.php">Hãy quay lại trang chủ</a>
          </h1>
            <?php
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}


?>
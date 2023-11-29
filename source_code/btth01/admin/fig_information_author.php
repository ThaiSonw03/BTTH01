<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";
$newNameAut = $_POST['txtAutNameUpdate'];
$newUrlAut = $_POST['txtImgAut'];
$idAut = $_POST['txtAutId'];

if (!empty($newNameAut)){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "UPDATE tacgia SET ten_tgia = '$newNameAut', hinh_tgia = '$newUrlAut' WHERE ma_tgia = $idAut";
        $conn->exec($sql);
        ?>
        <h1 class="text-center">
            Đã sửa thông tin tác giả
            <a href="index.php">Hãy quay lại trang chủ</a>
        </h1>
        <?php
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}


?>
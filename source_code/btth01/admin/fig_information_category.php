<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";
$newNameCate = $_POST['txtCateNameUpdate'];
$idCate =  $_POST['txtCatId'];
echo $idCate;
echo $newNameCate;
if (!empty($newNameCate)){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "UPDATE baiviet SET ten_tloai = '$newNameCate' WHERE ma_tloai = $idCate";
        $conn->exec($sql);
        ?>
        <h1 class="text-center">
            Đã sửa thông tin bài hát
            <a href="index.php">Hãy quay lại trang chủ</a>
        </h1>
        <?php
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}


?>
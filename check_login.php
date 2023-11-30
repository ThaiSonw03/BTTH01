<?php
if (isset($_POST['sbmLogin'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "btth01_485";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $query = "select * from users where tai_khoan='$user'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $user = $stmt->fetch();
   

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
  
        if ($user['isConfirmed']) {
            echo 1;
          $pash_hash = $user['mat_khau'];
          if (password_verify($pass, $pash_hash)) {
            
            header("location: ./admin/index.php");
          } else {
            header("Location: ./login.php?message=not-matched-password");
          }
        } else {
          header("Location: ./login.php?message=Tài khoản chưa được xác thực");
        }
      } else {
        header("Location:./login.php?message=not-existed");
      }
  } catch (PDOException $e) {
    $e->getMessage();
  }
}?>

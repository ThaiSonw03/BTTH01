<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM baiviet ORDER BY ma_bviet DESC ";
    $stmt = $conn->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$count = 1;
foreach ($posts as $post) :
    ?>

    <tr>
        <th scope="row"><?=$count++?></th>
      <td><?=$post['tieude']?></td>
      <td><?=$post['ten_bhat']?></td>
      <td><?=$post['tomtat']?></td>
      <td><?=$post['noidung']?></td>
      <td><?=$post['ngayviet']?></td>
      <td><img src="<?=$post['hinhanh']?>" alt="hinhanh"/></td>
        <td>
            <a href="edit_article.php?id=<?=$post['ma_bviet']?>"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
        <td>
            <a href="delete_article.php?id=<?=$post['ma_bviet']?>"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>

<?php endforeach; ?>
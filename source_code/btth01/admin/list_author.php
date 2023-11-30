<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM tacgia ORDER BY ma_tgia DESC ";
    $stmt = $conn->query($sql);
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$count = 1;
foreach ($authors as $author) :
    ?>

    <tr>
        <th scope="row"><?=$count++?></th>
        <td><?=$author['ten_tgia']?></td>
        <td><img src="../upload/<?=$author['hinh_tgia']?>" alt="hinhanh"/></td>
        <td>
            <a href="edit_author.php?id=<?=$author['ma_tgia']?>"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
        <td>
            <a href="delete_author.php?id=<?=$author['ma_tgia']?>" ><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>

<?php endforeach; ?>
<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM theloai ORDER BY ma_tloai DESC ";
    $stmt = $conn->query($sql);
    $categorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$count = 1;
foreach ($categorys as $category) :
?>

<tr>
    <th scope="row"><?=$count++?></th>
    <td><?=$category['ten_tloai']?></td>
    <td>
        <a href="edit_category.php?id=<?=$category['ma_tloai']?>"><i class="fa-solid fa-pen-to-square"></i></a>
    </td>
    <td>
        <a href="delete_category.php?id=<?=$category['ma_tloai']?>"><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>

<?php endforeach; ?>
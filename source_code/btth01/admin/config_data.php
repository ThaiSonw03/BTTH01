<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Tổng số lượng người dùng
    $number_users_query = "SELECT COUNT(ma_nguoidung) FROM users";
    $stmt_users = $conn->query($number_users_query);
    $number_users = $stmt_users->fetchColumn();

    // Tổng số lượng thể loại
    $number_categorys_query = "SELECT COUNT(ma_tloai) FROM theloai";
    $stmt_categorys = $conn->query($number_categorys_query);
    $number_categorys = $stmt_categorys->fetchColumn();

    // Tổng số lượng bài viết
    $number_posts_query = "SELECT COUNT(ma_bviet) FROM baiviet";
    $stmt_posts = $conn->query($number_posts_query);
    $number_posts = $stmt_posts->fetchColumn();

    // Tổng số lượng tác giả
    $number_author_query = "SELECT COUNT(ma_tgia) FROM tacgia";
    $stmt_author = $conn->query($number_author_query);
    $number_author = $stmt_author->fetchColumn();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Người dùng</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= $number_users?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Thể loại</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo $number_categorys; ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Tác giả</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo $number_author; ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Bài viết</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo $number_posts; ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>

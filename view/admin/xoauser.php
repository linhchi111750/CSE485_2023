<?php
declare(strict_types = 1);
require '../includes/database_connection.php';
require '../includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if(!$id){
    redirect('author.php', ['failure' => 'Không tìm thấy user']);
}

$result = false;
$sql = "SELECT ma_user, hoten FROM user WHERE ma_user = :ma_user";
$result = pdo($pdo, $sql, ['ma_user' => $id])->fetch();
if(!$result){
    redirect('author.php', ['failure' => 'Không tìm thấy user']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "DELETE FROM user WHERE ma_user = :ma_user";
    pdo($pdo, $sql, ['ma_user' => $id]);
    $sql = "DELETE FROM user WHERE hoten = :hoten";
    pdo($pdo, $sql, ['hoten' => $id]);
    redirect('author.php', ['success' => 'Đã xóa user']);
}
?>
<?php $title = "Xoá user"; require '../includes/header_admin.php'; ?>
    <main class="container admin d-flex justify-content-center" id="content" style="min-height: 50vh; margin-top: 200px">
        <form action="delete_author.php?id=<?= $id; ?>" method="POST" class="narrow">
            <h1 class="m-3">Xóa user</h1>
            <p>Bạn có chắc chắn muốn xóa user: <em><?= html_escape($result['hoten']) ?></em>?</p>
            <div class="row" margin>
                <div class="col-6">
                    <input type="submit" name="delete" value="Xóa" class="btn btn-danger">
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="author.php" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </form>
    </main>
<?php include '../includes/footer.php'; ?>
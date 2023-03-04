<?php
declare(strict_types=1);
require '../includes/database_connection.php';
require '../includes/functions.php';


$id     = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$result = [
    'hoten' => '',
    'ten_dnhap' => ''
  
];

if ($id) {
    $sql = "SELECT ma_user, hoten, ten_dnhap,mat_khau
            FROM user
            WHERE ma_user = :ma_user";
    $result = pdo($pdo, $sql, ['ma_user' => $id])->fetch();

    if (!$result) {
        redirect('author.php', ['failure' => 'Không tìm thấy user']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoten = $_POST['hoten'];
    $ten_dnhap = $_POST['ten_dnhap'];
    $mat_khau = $_POST['mat_khau'];

    $argument = [
        'ma_user' => $id,
        'hoten' => $hoten,
       'ten_dnhap' => $ten_dnhap,
       'mat_khau' => $mat_khau
    ];

    pdo($pdo, $sql, $argument);
    redirect('author.php', ['success' => 'Sửa thành công user']);
}



?>
<?php $title = "Sửa user";
require '../includes/header_admin.php'; ?>

<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin user</h3>
            <form action="edit_author.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="ma_tgia">Mã user</span>
                    <input type="text" class="form-control" name="ma_tgia" readonly value="<?= $id ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="ten_tgia">Họ Tên user</span>
                    <input type="text" class="form-control" name="ten_tgia" value="<?= $result['hoten'] ?>">
                </div>
                
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="ten_tgia">Tên đăng nhập user</span>
                    <input type="text" class="form-control" name="ten_tgia" value="<?= $result['ten_dnhap'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="ten_tgia">Mật khẩu user</span>
                    <input type="text" class="form-control" name="ten_tgia" value="<?= $result['mat_khau'] ?>">
                </div>
                
                <div class="row">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="author.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include '../includes/footer.php';
?>
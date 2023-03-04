<?php
declare(strict_types = 1);
require '../includes/database_connection.php';
require '../includes/functions.php';
require '../includes/validate.php';

$title = 'Thêm bài viết';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$article = [
    'ma_tloai'  =>$id,
    'ten_tloai'    => '',
    'SLBaiViet'   => '',
];

$errors = [
    'ma_tloai'   => '',
    'ten_tloai'    => '',
    'SLBaiViet'   => '',
];

if($id){
    $sql = "SELECT ma_tloai,ten_tloai, SLBaiViet
            FROM theloai
            WHERE ma_tloai = :ma_tloai";
    $article = pdo($pdo, $sql, ['ma_tloai' => $id])->fetch();
    
    if(!$article){
        redirect('quanlytheloai.php', ['failure' => 'Không tìm thấy bài viết']);
    }
}


$sql        = "SELECT ma_tloai, ten_tloai,SLBaiViet FROM theloai";
$categories = pdo($pdo, $sql)->fetchAll();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $errors['hinhanh'] = ($temp === '' and $_FILES['image']['error'] === 1) ? 'Kích cỡ file quá lớn' : '';


   
    
    $article['ma_tloai']    = $_POST['ma_tloai'];
    $article['ten_tloai']    = $_POST['ten_tloai'];
    $article['SLBaiViet']    = $_POST['SLBaiViet'];
    

    $errors['ten_tloai']    = is_text($article['ten_tloai'], 1, 80) ? '' : 'Tiêu đề phải chứa 1 - 80 kí tự';
    $errors['SLBaiViet']   = is_text($article['SLBaiViet'], 1, 10000) ? '' : 'Nội dung phải chứa từ 1 - 100,00 kí tự';
    $errors['theloai']   = is_category_id($article['ma_tloai'], $categories) ? '' : 'Vui lòng chọn thể loại';

    $invalid = implode($errors);

    if($invalid){
        $errors['warning'] = 'Hãy sửa các lỗi ở trên';
    } 
    else{
        $arguments = $article;
        if($id){
            $sql = "UPDATE theloai 
                       SET ten_tloai = :ten_tloai, SLBaiViet = :SLBaiViet
                    WHERE ma_tloai = :ma_tloai";
        }
        else{
            unset($arguments['ma_tloai']);
            $sql = "INSERT INTO theloai(ma_tloai, ten_tloai,SLBaiViet)
                            VALUES (:ma_tloai, :ten_tloai, :SLBaiViet)";
        }
        
        pdo($pdo, $sql, $arguments);
        redirect('quanlytheloai.php', ['success' => 'Đã lưu bài viết']);
    }
}
?>
<?php include '../includes/header_admin.php'; ?>
    <form action="themtheloai.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <main class="container" id="content">
        <h3 class="text-center text-uppercase fw-bold mt-4">Thêm  thể loại</h3>
            
            <div class="row">
                <section class="text col-sm-6">
                    <div class="form-group">
                        <label for="tieude" class="fw-bold">Mã thể loại: </label>
                        <input type="text" name="ma_tloai" id="ma_tloai" value="<?= html_escape($article['ma_tloai']) ?>"
                            class="form-control">
                        <span class="errors"><?= $errors['ma_tloai'] ?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ten_bhat" class="fw-bold">Tên thể loại: </label>
                        <input type="text" name="ten_tloai" id="ten_tloai" value="<?= html_escape($article['ten_tloai']) ?>"
                            class="form-control">
                        <span class="errors"><?= $errors['ten_tloai'] ?></span>
                    </div>
                   
                    <div class="form-group mt-2">
                        <label for="tomtat" class="fw-bold">Số lượng bài viết: </label>
                        <textarea name="SLBaiViet" id="SLBaiViet"
                                class="form-control"><?= html_escape($article['SLBaiViet']) ?></textarea>
                        <span class="errors"><?= $errors['SLBaiViet'] ?></span>
                    </div>
                    
                    <div class="mt-2 mb-2 d-flex justify-content-end">
                        <input type="submit" name="update" value="Lưu lại" class="btn btn-success m-1">
                        <a href="quanlytheloai.php" class="btn btn-warning m-1">Quay lại</a>
                    </div>
                </section>
            </div>
        </main>
    </form>
    <script>
        const inputFile = document.getElementById('image');
        const imagePreview = document.getElementById('display-image');

        inputFile.addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', function() {
            imagePreview.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>

<?php include '../includes/footer.php' ?>
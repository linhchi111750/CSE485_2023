<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$article =
  [
    'ma_bviet' => 1,
    'tieude' => 'abc',
    'ten_bhat' => 'glhf',
    'noidung' => 'xyz',
    'tomtat' => 'xyz',
    'ngayviet' => '1/1/2022',
    'hinhanh' => 'abc.png',
    'ma_tloai' => 1,
    'ma_tgia' => 1,
  ]
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\..\fa-icons\css\all.css">
  <link rel="stylesheet" href="..\style.css">
  <script href="..\..\bootstrap\js\bootstrap.min.js"></script>
  <title>Category</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>

  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center text-uppercase fw-bold"><?php echo $id ? "Sửa thông tin" : "Thêm" ?> bài viết</h3>
        <form action="process_add_category.php" method="post">

          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblIndex">Tiêu đề</span>
            <input type="text" class="form-control" name="txtIndexName" value=<?php echo $id ? $article['tieude'] : "" ?>>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblSongName">Tên bài hát</span>
            <input type="text" class="form-control" name="txtSongName" value=<?php echo $id ? $article['ten_bhat'] : "" ?>>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblSum">Tóm tắt</span>
            <textarea type="text" class="form-control" name="txtSum" value=<?php echo $id ? $article['tomtat'] : "" ?>></textarea>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblContent">Nội dung</span>
            <textarea type="text" class="form-control" name="txtContent" value=<?php echo $id ? $article['noidung'] : "" ?>></textarea>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblImg">Nội dung</span>
            <input type="file" accept="image/png, image/jpeg" class="form-control" name="txtImg" value=<?php echo $id ? $article['noidung'] : "" ?>>
          </div>

          <div class="form-group float-end ">
            <input type="submit" value="Lưu lại" class="btn btn-primary">
            <a href="article.view.php" class="btn btn-secondary ">Quay lại</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php include_once("./layouts/footer.view.php") ?>
</body>
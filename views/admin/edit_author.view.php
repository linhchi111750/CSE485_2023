<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$author = ["ten_tgia" => "mozart", "hinh_tgia"];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\style.css">
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <title>Category</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>

  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center text-uppercase fw-bold"><?php echo $id ? "Sửa thông tin" : "Thêm" ?> tác giả</h3>
        <form action="process_add_category.php" method="post">

          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblAuthName">Tên tác giả</span>
            <input type="text" class="form-control" name="txtAuthName" value=<?php echo $id ? $author['ten_tgia'] : "" ?>>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblImgAuth">Hình tác giả</span>
            <input type="file" accept="image/png, image/jpeg" class="form-control" name="imgAuth" value=<?php echo $id ? $author['ten_tgia'] : "" ?>>
          </div>

          <div class="form-group  float-end ">
            <input type="submit" value="Lưu lại" class="btn btn-primary">
            <a href="author.view.php" class="btn btn-secondary ">Quay lại</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php include_once("./layouts/footer.view.php") ?>
</body>
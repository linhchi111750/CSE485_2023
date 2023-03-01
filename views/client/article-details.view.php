<?php
$article = [
  'ma_bviet' => 1,
  'tieude' => 'abc',
  'ten_bhat' => 'glhf',
  'noidung' => 'xyz',
  'tomtat' => 'xyz',
  'ngayviet' => '1/1/2022',
  'hinhanh' => '/CSE485_2023/assets/images/songs/cayvagio.jpg',
  'ma_tloai' => 1,
  'ma_tgia' => 1,
];
$category = [
  "ma_tloai" => '1',
  "ten_tloai" => "nhac tru tinh"
];
$author = ["ten_tgia" => "mozart", "hinh_tgia" => 'abc.png'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <script src="..\..\bootstrap\js\bootstrap.min.js"></script>
  <script defer src="../../fa-icons/brands.min.js"></script>
  <script defer src="../../fa-icons/fontawesome.min.js"></script>
  <script defer src="../../fa-icons/solid.min.js"></script>
  <title>Sign in</title>
</head>

<body>
  <?php include_once("layouts/navbar.view.php") ?>

  <main class="container mt-5">

    <div class="row mb-5">
      <div class="col-sm-4">
        <img src="<?php echo $article['hinhanh'] ?>" class="img-fluid" alt="...">
      </div>
      <div class="col-sm-8">
        <h5 class="card-title mb-2">
          <a href="" class="text-decoration-none">Cây và gió</a>
        </h5>
        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $article['ten_bhat'] ?></p>
        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $category['ten_tloai'] ?></p>
        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $article['tomtat'] ?></p>
        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $article['noidung'] ?></p>
        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $author['ten_tgia'] ?></p>

      </div>
    </div>
  </main>
</body>

</html>
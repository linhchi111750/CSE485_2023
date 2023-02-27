<?php
$authors = [];
$users = [];
$article = [];
$categories = [];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\style.css">
  <script href="..\..\bootstrap\js\bootstrap.min.js"></script>
  <title>Statistics</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>
  <main class="container mt-5 mb-5">
    <h3 class="text-center text-uppercase mb-3 text-primary">Thống kê số lượng</h3>
    <div class="row">
      <div class="col-sm-3">
        <div class="card mb-2" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center text-info">
              Người dùng
            </h5>

            <h5 class="h1 text-center">
              <?php echo sizeof($users); ?>
            </h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card mb-2" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center text-info">
              Thể loại
            </h5>
            <h5 class="h1 text-center">
              <?php echo sizeof($categories); ?>
            </h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card mb-2" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center text-info">
              Tác giả
            </h5>

            <h5 class="h1 text-center">
              <?php echo sizeof($authors); ?>
            </h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card mb-2" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center text-info">
              Bài viết
            </h5>

            <h5 class="h1 text-center">
              <?php echo sizeof($article); ?>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include_once("./layouts/footer.view.php") ?>
</body>
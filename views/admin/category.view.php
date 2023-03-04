<?php
$categories = [
  [
    "ma_tloai" => '1',
    "ten_tloai" => "nhac tru tinh"
  ],
  [
    "ma_tloai" => '2',
    "ten_tloai" => "rock"
  ]
];
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\style.css">
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script defer src="../../fa-icons/brands.min.js"></script>
  <script defer src="../../fa-icons/fontawesome.min.js"></script>
  <script defer src="../../fa-icons/solid.min.js"></script>
  <title>Category</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>
  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <a href="edit_category.view.php?id=" class="btn btn-success">Thêm mới</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên thể loại</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            foreach ($categories as $category) : ?>
              <tr>
                <th scope="row"><?php global $index;
                                echo $index ?></th>
                <td><?php echo $category['ten_tloai']; ?></td>
                <td>
                  <a href="edit_category.view.php?id=<?php echo $category['ma_tloai'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php $index++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <?php include_once("./layouts/footer.view.php") ?>
</body>

</?>
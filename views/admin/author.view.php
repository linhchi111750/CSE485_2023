<?php
$authors = [
  [
    'ma_tgia' => '1',
    'ten_tgia' => 'abc',
    'hinh_tgia' => 'xyz',
  ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\style.css">
  <script href="..\..\bootstrap\js\bootstrap.min.js"></script>
  <script defer src="../../fa-icons/brands.min.js"></script>
  <script defer src="../../fa-icons/fontawesome.min.js"></script>
  <script defer src="../../fa-icons/solid.min.js"></script>
  <title>Author</title>
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
              <th scope="col">Tên tác giả</th>
              <th scope="col">Hình tác giả </th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            foreach ($authors as $author) : ?>
              <tr>
                <th scope="row"><?php global $index;
                                echo $index ?></th>
                <td><?php echo $author['ten_tgia']; ?></td>
                <td><?php echo $author['hinh_tgia']; ?></td>
                <td>
                  <a href=edit_author.view.php?id=<?php echo $author['ma_tgia'] ?>><i class="fa-solid fa-pen-to-square"></i></a>
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

</html>
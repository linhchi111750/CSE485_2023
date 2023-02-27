<?php
$file = $_SERVER["SCRIPT_NAME"];

$isLogin = ($file === "/CSE485_2023/views/client/signin.view.php")
  || ($file === "/CSE485_2023/views/client/signup.view.php");
$isHome = ($file === "/CSE485_2023/views/client/index.view.php");

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
  <div class="container-fluid">
    <div class="h3">
      <a class="navbar-brand text-primary" href="#">MUSIC</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $isHome ? "active fw-bold" : '' ?>" aria-current="page" href="index.view.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $isLogin ? "active fw-bold" : '' ?>" href="signin.view.php">Đăng nhập</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
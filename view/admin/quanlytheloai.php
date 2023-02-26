<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Bin-It">
    <meta property="og:url" />
   
    <meta property="og:description" content="Wellcome to my Website" />

    <title>Quản trị</title>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> 
    <!--===============================================================================================-->
    <link rel="stylesheet" href="/css/cssqlbaiviet.css">
    <!-- Latest compiled and minified CSS -->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 

    <script type="text/javascript">
        //Phân Trang Cho Table
        //<![CDATA[
        function Pager(tableName, itemsPerPage) {
            this.tableName = tableName;
            this.itemsPerPage = itemsPerPage;
            this.currentPage = 1;
            this.pages = 0;
            this.inited = false;

            this.showRecords = function (from, to) {
                var rows = document.getElementById(tableName).rows;
                for (var i = 1; i < rows.length; i++) {
                    if (i < from || i > to)
                        rows[i].style.display = 'none';
                    else
                        rows[i].style.display = '';
                }
            }

            this.showPage = function (pageNumber) {
                if (!this.inited) {
                    alert("not inited");
                    return;
                }
                var oldPageAnchor = document.getElementById('pg' + this.currentPage);
                oldPageAnchor.className = 'pg-normal';

                this.currentPage = pageNumber;
                var newPageAnchor = document.getElementById('pg' + this.currentPage);
                newPageAnchor.className = 'pg-selected';

                var from = (pageNumber - 1) * itemsPerPage + 1;
                var to = from + itemsPerPage - 1;
                this.showRecords(from, to);
            }

            this.prev = function () {
                if (this.currentPage > 1)
                    this.showPage(this.currentPage - 1);
            }

            this.next = function () {
                if (this.currentPage < this.pages) {
                    this.showPage(this.currentPage + 1);
                }
            }

            this.init = function () {
                var rows = document.getElementById(tableName).rows;
                var records = (rows.length - 1);
                this.pages = Math.ceil(records / itemsPerPage);
                this.inited = true;
            }
            this.showPageNav = function (pagerName, positionId) {
                if (!this.inited) {
                    alert("not inited");
                    return;
                }
                var element = document.getElementById(positionId);

                var pagerHtml = '<span onclick="' + pagerName +
                    '.prev();" class="pg-normal">&#171</span> | ';
                for (var page = 1; page <= this.pages; page++)
                    pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName +
                    '.showPage(' + page + ');">' + page + '</span> | ';
                pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">&#187;</span>';

                element.innerHTML = pagerHtml;
            }
        }
        //]]>
    </script>
</head>

<body onload="time()">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>   QUẢN TRỊ TLU'S MUSIC GARDEN</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#home">QUẢN LÝ THỂ LOẠI</a></li>
                    <li><a href="/CSE485_2023/view/admin/quanlyuser.php"  >QUẢN LÝ NGƯỜI DÙNG</a></li>
                    <li><a href="/CSE485_2023/view/admin/quanlytacgia.php"  >QUẢN LÝ TÁC GIẢ</a></li>
                    <li><a href="/CSE485_2023/view/admin/quanlybaiviet.php"  >QUẢN LÝ BÀI VIẾT</a></li>
                   
                        <li>
                            <a href="#"  ><b>TÀI KHOẢN</b>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown">
                                <li><a href="/html/trangchu.html"  ><b>ĐĂNG XUẤT <i class="fas fa-sign-out-alt"></i></b></a></li>
                            </ul>
                        </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid al">
        <div id="clock"></div>
        <Br>
        <p class="timkiemnhanvien"><b>TÌM KIẾM THỂ LOẠI:</b></p><Br><Br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập ID thể loại cần tìm..."
            data-toggle="tooltip" data-placement="bottom" title="Tìm Kiếm thể loại">
        <i class="fa fa-search" aria-hidden="true"></i>

        <form action="">

        </form>
        <b>THÊM THỂ LOẠI:</b><Br>
        <button class="nv btn add-new" type="button" data-toggle="tooltip" data-placement="top"
            title="Thêm thể loại"><i class="fas fa-user-plus"></i></button>
         
        
        <div class="table-title">
            <div class="row">

            </div>

        </div>
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr class="ex">
                    <th width="auto">Mã thể loại</th>
                  
                    <th>Tên thể loại</th>
                   
                     <th width="200px; !important">Tính Năng</th> 
                </tr>
            </thead>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'btth01_cse485');
            $sql = "SELECT * FROM theloai";
            $result = $conn->query($sql);
            $stt = 1;
            while($row = $result ->fetch_assoc()){
                echo
                "<tr>
                <td>".$row['ma_tloai']."</td>
                <td>".$row['ten_tloai']."</td>
                
                <td><a href='#'>Sửa</a><a href='#'>Xóa</a><a href='#'>Lưu lại</a></td>
                </tr>";   }
            ?> 
                       <!-- <td>
                        <a class="add" title="Lưu Lại" data-toggle="tooltip"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i></a>
                        <a class="edit" title="Sửa" data-toggle="tooltip"><i class="fa fa-pencil"
                                aria-hidden="true"></i></a>
                        <a class="delete" title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></a>

                                <td><a href+'#'>Sửa</a></td>
                    </td> -->
        </table>
                <div id="pageNavPosition" class="text-right"></div>
                <script type="text/javascript">
                    var pager = new Pager('myTable', 5);
                    pager.init();
                    pager.showPageNav('pager', 'pageNavPosition');
                    pager.showPage(1);
                </script>
            </div>
    <hr class="hr1">
    <div class="container-fluid end">
        <div class="row text-center">
        <div class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <b class="text-center text-uppercase fw-bold">TLU's music garden</b>
    </div>
            <div class="col-lg-12 link">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-google"></i>
            </div>
       
            <div class="col-lg-12">
                Design by <a href="#">CSE485</a>
            </div>
        </div>
    </div>
<style>
    body{
    padding: 0;
    margin: 0;
    color: black;
    font-family: Montserrat-Bold;
    z-index: 9999;
  } 
  ::-webkit-scrollbar {
    background:black;
    width:4px;
    height: 20px;
    overflow: hidden;
    }
    ::-webkit-scrollbar-thumb {         
    background:white !important;
    border-radius: 30px;
    }
  /* Add a dark background color with a little bit see-through */ 
.navbar {
    margin-bottom: 0;
    background-color: rgb(255, 255, 255) !important;
    border: 0;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 400;
    text-align: center;
    z-index: 999;
    box-shadow: 10px 0px 40px rgb(201, 200, 200);
  }
  
  /* Add a gray color to all navbar links */
  .navbar li a, .navbar .navbar-brand { 
    color: #000000 !important;
    padding-left:10px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  .navbar-brand{
      font-weight: 900 !important;
      
  }
  
  /* On hover, the links will turn white */
  .navbar-nav li a:hover {
    color: #6DD4FF !important;
  }
  
  /* The active link */
  .navbar-nav li.active a {
    color: #6DD4FF !important;
    background: none !important;
    border-bottom: 2px solid black;
  }
  
  /* Remove border color from the collapsible button */
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  
  /* Dropdown */
  ul{
    padding: 0;
    list-style: none;
   
}
ul li{
    display: inline-block;
    position: relative;
    line-height: 21px;
    text-align: left;
}
ul li a{
    display: block;
    padding: 8px 25px;
    color: #333;
    text-decoration: none;
    font-weight: 900;
    font-size: 10px;
}
ul li a:hover{
    
    text-decoration: none;
}
ul li ul.dropdown{
    min-width: 100%; /* Set width of the dropdown */
    background: #f2f2f2;
    display: none;
    position: absolute;
    z-index: 999;
    left: 0;
}
ul li:hover ul.dropdown{
  display: block;	/* Display the dropdown */
    background: #ffffff;
    color: white !important;
    width: 200px;
}
ul li ul.dropdown li{
    display: block;
}
  .fa-bars{
    font-size: 15px;
  }
  .al{
      padding-top: 100px !important;
      padding-bottom: 150px;
  }
  .nv{
      background: #6DD4FF;
      border: 1px solid rgb(255, 255, 255);  
      width: 100px;
      text-align: center;
      height: 30px;
      border-radius: 5px;
      color: rgb(255, 255, 255);
      float: left;
     margin-right: 10px;
     margin-bottom: 10px;
     margin-top: 10px;
     font-weight: 600;
  }
  .nv1{
    background: #6DD4FF;
    border: 1px solid rgb(255, 255, 255);  
    width: 100px;
    text-align: center;
    height: 30px;
    border-radius:5px;
    color: white;
    margin-left: auto;
    margin-right: auto;
    font-weight: 600;
  }
  .nv:hover, .nv:active{
      background: white;
      border: 1px solid black;
      color: black;
  }
  .nv1:hover, .nv1:active{
      background: white;
      border: 1px solid black;
      color: black;
  }
  thead tr th{
      color: rgb(255, 255, 255);
      font-size: 14px;
      font-weight: 600;
      background: #6DD4FF;
      text-align: center !important;
  }
  tbody tr td{
      text-align: left;
      color: black;
      font-weight: 600;
  }
  .ds{
      font-size: 30px;
      color: black;
  }
  #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 14px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
    border-radius: 20px;
  }
  .header{
      color: rgb(255, 255, 255);
      font-size: 13px;
      background: #6DD4FF;
  }

  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-size: 12px;
    padding: 0px !important;
  }
  
  #myTable th,
   #myTable td {
    text-align: left;
    padding: 10px;
    padding-bottom: 15px;
    padding-top: 15px;
  }
  
  #myTable tr {
    border-bottom: 1px solid #ddd;
  }
  

  form input{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      border-radius: 30px;
      height: 40px;
  }
  .end{
    color: rgb(0, 0, 0);
    padding-bottom: 20px;
    padding-top: 20px;
    font-weight: 600;
  }
  .col-lg-12 a{
      color: #6DD4FF;
  }
  .col-lg-12 a:hover{
    text-decoration: none;
    color: green;
  }
  #topBtn{
    position: fixed;
    bottom: 90px;
    right: 40px;
    font-size: 12px;
    width: 30px;
    height: 30px;
    background: rgb(0, 0, 0);
    color: rgb(236, 236, 236);
    border: none;
    cursor: pointer;
    display: none;
    opacity: 1;
    opacity: 0.9;
  }
  .myInput{
    position: relative;
  }
  .fa-search{
    position: absolute;
    margin-left: 15px;
  margin-top: -40px;
  }
 
  #clock{
    text-align: center;
    float: right;
    border-radius: 20px;
    font-weight: 600;
    color: rgb(0, 0, 0);
    font-size: 13px;
    width: 250px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
  }
  .background-modal {
    display: none; 
    position: fixed;
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%; 
    text-align: left;
    border-radius: 12px;
}

.dataTables_filter{
  display: none;
}
.sorting {
  background: none !important;
}
#myTable table {
  padding: 0px 0px 0px 0px !important;
  border-bottom: 1px solid black;
  font-weight: bold;
  cursor: pointer;
  *cursor: hand;
}
.pagination{
  float: right;
}
.hr1{
  border: 1px solid black;
}
.link i{
  margin-left: 20px;
  padding: 10px 10px 10px 10px;
  border: 2px solid black;
  border-radius: 50%;
}
.link{
  padding-bottom: 20px;
}

  .table-title {
      padding-bottom: 10px;
      margin: 0 0 10px;
  }
  .table-title h2 {
      margin: 6px 0 0;
      font-size: 22px;
  }
  .table-title .add-new {
      float: right;
  height: 30px;
  font-weight: bold;
  font-size: 12px;
  text-shadow: none;
  min-width: 100px;
  border-radius: 50px;
  line-height: 13px;
  }
.table-title .add-new i {
  margin-right: 4px;
}
  table.table {
      table-layout: fixed;
  }
  table.table tr th, table.table tr td {
      border-color: #e9e9e9;
  }
  table.table th i {
      font-size: 13px;
      margin: 0 5px;
      cursor: pointer;
  }
  table.table th:last-child {
      width: 100px;
  }
  table.table td a {
  cursor: pointer;
      display: inline-block;
      margin: 0 5px;
  min-width: 24px;
  }    
table.table td a.add {
      color: #27C46B;
  }
  table.table td a.edit {
      color: #6DD4FF;
  }
  table.table td a.delete {
      color: #E34724;
  }
  table.table td i {
      font-size: 15px;
  }
table.table td a.add i {
      font-size: 15px;
    margin-right: -1px;
      position: relative;
      top: 3px;
  }    
  table.table .form-control {
      height: 32px;
      line-height: 32px;
      box-shadow: none;
      border-radius: 2px;
  }
table.table .form-control.error {
  border-color: #f50000;
}
table.table td .add {
  display: none;
}
.modal-3 li a{
  border: 1px solid black !important;
  color: #000000 !important;
  font-size: 12px;
}
.pg-normal {
  color: #6DD4FF;
  font-weight: normal;
  text-decoration: none;  
  cursor: pointer;  
  font-weight: 600;
  text-align: center;
}

.pg-selected {
  color: black;
  font-weight: bold;     
  text-decoration: underline;
  cursor: pointer;
  text-decoration: none;
  font-size: 15px;
  text-align: center;
}
</style>
    <script type="text/javascript">
       
        //Lọc Table

        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + ":" + m + ":" + s;
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }

        //Thêm Bảng
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="ma_tloai" id="ma_tloai" placeholder="Nhập mã thể loại"></td>' +
                    '<td><input type="text" class="form-control" name="ten_tloai" id="ten_tloai" placeholder="Nhập Tên thể loại"></td>' +
                    
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            //Add Hàng
            $(document).on("click", ".add", function () {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function () {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        swal("Thông Báo!", "Dữ Liệu Trống Vui Lòng Kiểm Tra", "error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                        swal("Thông Báo!", "Bạn Chưa Nhập Dữ Liệu", "error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                        swal("Thành Công", "Bạn Đã Cập Nhật Thành Công", "success");
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");

                }
            });
            // Edit Hàng
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                        .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            jQuery(function () {
                jQuery(".add").click(function () {
                    swal("Thành Công!", "Bạn Đã Sửa Thành Công", "success");
                });
            });
            // Delete Hàng
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                swal("Thành Công!", "Bạn Đã Xóa Thành Công", "success");
                $(".add-new").removeAttr("disabled");
            });
        });

        jQuery(function () {
            jQuery(".cog").click(function () {
                swal("Sorry!", "Tính Năng Này Chưa Có", "error");
            });
        });
    </script>
    <!--Tooltip-->
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
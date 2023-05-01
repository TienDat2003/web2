<?php
require 'DataProvider.php';

session_start();
// Lấy giá trị của biến session

?>

<?php
if (isset($_GET['out']))
{   
    // echo '<script>
    //     alert("Đăng xuất thành công">
    // </script>
    // ';
    unset($_SESSION['user']);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="./asset/themify-icons/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./asset/fonts/remixicon.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }

      input[type=number] {
          -moz-appearance: textfield;
      }
  </style>
</head>
<body style="overflow-x: hidden;">
    <!-- header -->
    <div id="header">
        <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top shadow-sm mb" id="mainNav">
            <div class="container-fluid px-5">
                <a class="navbar-brand fw-bold header-logo" href="index.php">
                    <img src="./asset/image/Untitled.png" alt="Logo" style="width:40px;" class="rounded-pill me-2">
                    Chú Khỉ Buồn
                </a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0 d-flex align-items-center">
                        <li class="nav-item">
                            <form class="d-flex me-lg-3" action="index.php" method="get">
                                <input class="form-control me-2" id="search-input" name="txtName" type="text" placeholder="Tìm" size="5px;">
                                <select name="select-type" class="form-select form-select-sm" id="select-bottom" style="width: 200px;margin-right: 14px;" aria-label=".form-select-sm example"> 
                                  <option value="0" selected="selected">Thể loại</option>

<?php

$sql = "SELECT * FROM loaisach";
$result = executeQuery($sql);
$i=1;
while ($row = $result -> fetch_array())
   {
        echo '<option value="'. $row['maloai'] .'"> '. $row['tenloai'] . '</option>';
   }
  echo '</select>';
?>
<?php
echo '
                                
                                <p style="min-width:90px;margin-bottom: 0px;margin-top: 9px;">Khoảng giá:</p>
                                <!-- <select class="form-select form-select-sm" :style="width 120px;margin-right: 14px;" aria-label=".form-select-sm example">
                                    <option value="0" selected="selected">10.000đ</option>
                                </select> -->
                                <input class="form-control me-2" name="min-find" id="min-find" type="number" size="5px;" style="width: 87px; " >
                                <p style="min-width:40px;margin-bottom: 0px;margin-top: 9px;">Đến</p>
                                <!-- <select class="form-select form-select-sm" style="width: 120px;margin-right: 14px;" aria-label=".form-select-sm example">
                                    <option value="0" selected="selected">500.000đ</option>
                                </select> -->
                                <input class="form-control me-2" name="max-find" id="max-find" type="number" size="5px;" style="width: 87px;">
                                <button class="btn btn-primary" id="search-icon" type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </li>
                        
                        <li class="cart nav-item">
                            <a class=" nav-link me-lg-3" href="./shopping-cart.php" style="white-space: nowrap;">
                                <i class="ti-shopping-cart"></i>  Giỏ hàng
                            </a>
                        </li>
                        ';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    echo '<li class="nav-item header-log-out"><a class="nav-link me-lg-3" href="./index.php" style="white-space: nowrap;"><i class="ti-user"></i> '.$username.'</a></li>';
    echo '<li class="nav-item header-log-out"><a class="nav-link me-lg-3" href="./index.php?out=1" style="white-space: nowrap;"><i class="ri-logout-box-line"></i> Đăng xuất</a></li>';
} 
else {
    // Biến session không tồn tại
    echo '<li class="nav-item header-login"><a class="nav-link me-lg-3" href="./login.php" style="white-space: nowrap;"><i class="ri-login-box-line"></i> Đăng Nhập/Đăng Ký</a></li>';
}
echo '
                      
                      </ul>
                    
                </div>
                
            </div>
            
        </nav>
       
    </div>

     <div id="content" class="mt-5 pt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./asset/image/ms_banner_img2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./asset/image/ms_banner_img3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </header>

            <div class="col py-3 container">
            <h1 class="my-4">Thể loại</h1>
              <div class="list-group col-2">';
              
$sql = "SELECT * FROM loaisach";
$result = executeQuery($sql);
while ($row = $result -> fetch_array())
   {
        echo '<a href="./index.php?theloai='. $row['tenloai'] . '" class="list-group-item"> '. $row['tenloai'] . '</a>';
   }
  echo '
                    </div>
                <div class="d-flex justify-content-center row" id="card-list">
                    <h2 class="text-center mt-3 pt-3" id="list-item-1">Danh sách sản phẩm</h2> ';
$per_page = 9;//số lượng sản phẩm 1 trangx
$sql = "SELECT * FROM sach WHERE 1";
$sql1 = " WHERE 1";
$temp=0;
$name="";
if (isset($_GET['theloai']))
{   
    $result = executeQuery("SELECT * FROM loaisach WHERE tenloai = '".$_GET['theloai']."'");
    $row = $result -> fetch_array();
    $loai = $row['maloai'];
    $sql .= " AND maloai = $loai ";
    $sql1 .= " AND maloai = $loai ";
}
if (isset($_GET['txtName'])&& $_GET['txtName']!="")
{
    $name=$_GET['txtName'];
    $temp=1;
	$sql .= " AND `tensach` like '%" . $_GET['txtName']  ."%'";
    $sql1 .= " AND `tensach` like '%" . $_GET['txtName']  ."%'";
}
$type="";
if (isset($_GET['select-type'])&&$_GET['select-type']!=0&&$_GET['select-type']!="")
{
    $type=$_GET['select-type'];
    $temp=1;
    $sql .= " AND maloai = " . $_GET['select-type'] . " ";
    $sql1 .= " AND maloai = " . $_GET['select-type'] . " ";
}
$min="";
if (isset($_GET['min-find'])&&$_GET['min-find']!=null){
    $min=$_GET['min-find'];
    $temp=1;
    $sql .= " AND gia > " . $_GET['min-find'] . " ";
    $sql1 .= " AND gia > " . $_GET['min-find'] . " ";
}
$max="";
if (isset($_GET['max-find'])&&$_GET['max-find']!=null){
    $max=$_GET['max-find'];
    $temp=1;
    $sql .= " AND gia < " . $_GET['max-find'] . " ";
    $sql1 .= " AND gia < " . $_GET['max-find'] . " ";
}
$total = mysqli_num_rows(executeQuery($sql));
$total_pages = ceil($total / $per_page);//tính số trang
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($current_page - 1) * $per_page;
$end = ($current_page ) * $per_page;
$sql .= " LIMIT $start, $per_page";
// $sql1 .= " LIMIT $start, $per_page";
$result = executeQuery($sql);

// Hiển thị các sản phẩm
while ($row = $result -> fetch_array()) {

        echo '<div class="col-lg-3 m-5">
        <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal-'. $row['masach'].'">
                <img class="card-img-top" src="./asset/image/'. $row['masach'].'.png" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="margin-bottom:20px;height:59px;">'. $row['tensach'] .'</h4>
                <div class="row">
                    <div class="col-5" style="margin-top:10px;">
                        <h5 class="text-danger reduce-cost">'. $row['gia']/1000 .'.000đ</h5>
                    </div>
                    <div class="col-7">
                        <a class="btn btn-primary text-light pay-button add-cart" style="float:right;"><i class="ri-shopping-cart-2-fill"></i>Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>      ';
    }
echo '
                </div>
            </div>';
$sql = "SELECT COUNT(*) AS numrows FROM sach";
$sql .= $sql1;
$result = executeQuery($sql);
// echo $sql;
// echo $result;
$row1 = $result->fetch_array();
// echo $row1['numrows'];
$numrows = $row1['numrows'];//gán số lượng sách vào numrows


$maxPage = ceil($numrows/$per_page);//tính tổng trang
$self = "index.php";//trang load những trang sau
$nav = '';//số trang



if ($maxPage>1) {
    if ($temp==0){
        for($page = 1; $page <= $maxPage; $page++){
            if ($page == $current_page) {
                $nav .= "<li class='page-item'><a class='page-link' >$page</a> </li>"; // khong can tao link cho trang hien hanh
            }
            else {
                $nav .= "<li class='page-item'><a class='page-link' href=\"$self?page=$page\">$page</a> </li>";// <a href=\"$self?page=$page\">$page</a>
            }
        }
        if ($current_page > 1)
        {
            $page = $current_page - 1;
            $prev = "<li class='page-item'><a class='page-link' href=\"$self?page=$page\">[Trang trước]</a> </li>";// <a href=\"$self?page=$page\">[Trang trước]</a> 
            $first = "<li class='page-item'><a class='page-link' href=\"$self?page=1\">[Trang đầu]</a> </li>";// <a href=\"$self?page=1\">[Trang đầu]</a>
        }
        else
        {
            $prev = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
            $first = '&nbsp;'; // va lien ket trang dau
        }
        if ($current_page < $maxPage)
        {
            $page = $current_page + 1;
            $next = "<li class='page-item'><a class='page-link' href=\"$self?page=$page\">[Trang kế]</a></li>";// <a href=\"$self?page=$page\">[Trang kế]</a>
            $last = "<li class='page-item'><a class='page-link' href=\"$self?page=$maxPage\">[Trang cuối]</a></li>";// <a href=\"$self?page=$maxPage\">[Trang cuối]</a>
        }
        else
        {
            $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
            $last = '&nbsp;'; // va lien ket trang cuoi
        }
        // hien thi cac link lien ket trang
        echo " <ul class='pagination justify-content-center'>"
        . $first . $prev . $nav . $next . $last .
        "</ul>";//<center>". $first . $prev . $nav . $next . $last . "</center>
    
}
    else{
        for($page = 1; $page <= $maxPage; $page++){
            if ($page == $current_page) {
                $nav .= "<li class='page-item'><a class='page-link' >$page</a> </li>"; // khong can tao link cho trang hien hanh
            }
            else {
                $nav .= "<li class='page-item'><a class='page-link' href=\"$self?page=$page&txtName=$name&select-type=$type&min-find=$min&max-find=$max\">$page</a> </li>";// <a href=\"$self?page=$page\">$page</a>
            }
        }
        if ($current_page > 1)
        {
            $page = $current_page - 1;
            $prev = "<li class='page-item'><a class='page-link' href=\"$self?page=$page&txtName=$name&select-type=$type&min-find=$min&max-find=$max\">[Trang trước]</a> </li>";// <a href=\"$self?page=$page\">[Trang trước]</a> 
            $first = "<li class='page-item'><a class='page-link' href=\"$self?page=1&txtName=$name&select-type=$type&min-find=$min&max-find=$max\">[Trang đầu]</a> </li>";// <a href=\"$self?page=1\">[Trang đầu]</a>
        }
        else
        {
            $prev = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
            $first = '&nbsp;'; // va lien ket trang dau
        }
        if ($current_page < $maxPage)
        {
            $page = $current_page + 1;
            $next = "<li class='page-item'><a class='page-link' href=\"$self?page=$page&txtName=$name&select-type=$type&min-find=$min&max-find=$max\">[Trang kế]</a></li>";// <a href=\"$self?page=$page\">[Trang kế]</a>
            $last = "<li class='page-item'><a class='page-link' href=\"$self?page=$maxPage&txtName=$name&select-type=$type&min-find=$min&max-find=$max\">[Trang cuối]</a></li>";// <a href=\"$self?page=$maxPage\">[Trang cuối]</a>
        }
        else
        {
            $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
            $last = '&nbsp;'; // va lien ket trang cuoi
        }
        // hien thi cac link lien ket trang
        echo " <ul class='pagination justify-content-center'>"
        . $first . $prev . $nav . $next . $last .
        "</ul>";//<center>". $first . $prev . $nav . $next . $last . "</center>
    }
}

$sql = "SELECT * FROM sach";
$result = executeQuery($sql);
$i=1;
while ($row = $result -> fetch_array()){
echo '
        <div class="container d-flex justify-content-center">
        <div class="modal" id="myModal-'. $row['masach'].'" style="margin-top: 30px;">
            <div class="modal-dialog modal-xl text-center" >
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body bg-white">
                        <div class="container">
                            <div class="row" id="modal-content">
                            <div class="col-8">
                            <h3 id="book-name">'. $row['tensach'].'</h3>
                            <hr>
                            <h5>Mô tả:</h5>
                            <span id="book-content">'. $row['mota'].'</span>
                            <hr>
                            <div class="row">
                                <div class="col-2 text-danger">
                                    <h5 id="cost">'. $row['gia']/1000 .'.000đ</h5>
                                </div>
                                <div class="col-2">
                                    <h6 id="realValue" style="text-decoration-line: line-through"></h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3">
                                    <b style="font-size: 30px;">Số lượng:</b>
                                </div>
                                <div class="col-3" style="margin-top: 10px;" class="in-cart">
                                        <button class="navbar-toggler minus" type="button" style="margin-right:20px;" ><i class="ti-minus"></i></button>
                                        <span style="font-size:19px;" id="number-cart">1</span>
                                        <button class="navbar-toggler plus" type="button" style="margin-left:20px;"><i class="ti-plus"></i></button>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-4" style="padding-left: 55px;">
                                    <a class="btn-cart cart 1 btn btn-primary text-light"><i class="ri-shopping-cart-2-fill"> Thêm vào giỏ hàng</i></a>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-4">
                            <img src="./asset/image/'. $row['masach'].'.png" alt="" srcset="" style="float: left;width:20rem;">
                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                </div>
                </div>
</div>';
                }
               

?>

    <footer class="" id="footer-index">
        <div class="box bg-light py-5">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img1.jpg" alt="">DỊCH VỤ TẬN TÂM</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img2.jpg" alt="">SẢN PHẨM ĐA DẠNG</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img3.jpg" alt="">VẬN CHUYỂN CHU ĐÁO</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img4.jpg" alt="">GIÁ CẢ HỢP LÝ</h5>
                  </div>
                </div>
              </div>
              <div class="container mt-5">
                <div class="row">
                  <div class="col">
                    <h5>LIÊN KẾT NHANH</h5>
                    <br>
                    <P>Sách Thiếu Nhi</P>
                    <p>Trinh Thám</p>
                    <p>Sách Văn học</p>
                    <p>Sách Có Chữ Ký</p>
                    <p>Văn Phòng Phẩm</p>
                    <p>Gợi Ý Cho Bạn</p>
                  </div>
                  <div class="col">
                    <h5>CÁC BỘ SƯU TẬP</h5>
                    <br>
                    <p>Bút - Viết</p>
                    <p>Dụng Cụ Học Sinh</p>
                    <p>Sản Phẩm Về Giấy</p>
                    <p>Dụng Cụ Văn Phòng</p>
                    <p>Dụng Cụ Vẽ</p>
                    <p>Sản Phẩm Điện Tử</p>
                    <p>Văn Phòng Phẩm Khác</p>
                  </div>
                  <div class="col">
                    <h5>HỖ TRỢ KHÁCH HÀNG</h5>
                    <br>
                    <p>Chính sách bảo mật</p>
                    <p>Hướng dẫn mua hàng</p>
                    <p>Phương thức thanh toán</p>
                    <p>Phương thức vận chuyển</p>
                    <p>Chính sách bảo hành</p>
                    <p>Chính sách đổi trả</p>
                    <p>Tin tuyển dụng</p>
                  </div>
                  <div class="col">
                    <h5>CHĂM SÓC KHÁCH HÀNG</h5>
                    <br>
                    <p>Liên hệ hỗ trợ</p>
                    <p>Hệ thống cửa hàng</p>
                    <p>Tin tuyển dụng</p>
                  </div>
                  <div class="col">
                    <h5>ĐỐI TÁC KINH DOANH</h5>
                    <br>
                    <p>Công Ty Phát Hành Sách</p>
                    <p>Văn Phòng Phẩm</p>
                  </div>
                </div>
                <br>
                <p style="text-align: center;">Sách Tiếng Việt | Sách Ngoại Văn | Văn Phòng Phẩm | Đồ Chơi | Đồ Trang Trí - Lưu Niệm | Theo Nhà Cung Cấp | Gợi Ý Quà Tặng | Sách có chữ ký</p>
                <p style="text-align: center;">Công ty TNHH Sách & Lịch Đại Nam Số ĐKKD 0311752595 do Sở KHĐT Tp. HCM cấp ngày 25/04/2012</p>
                <img style="max-width: 160px; padding-bottom: 15px; display: block; margin: auto;" alt="" title="" src="https://theme.hstatic.net/1000363117/1000606112/14/logosalenoti_large.png">
              </div>
        </div>
    </footer>
    <!--  <script src="./js/main.js"></script>-->
</body>
</html>


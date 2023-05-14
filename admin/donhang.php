<?php
require '../DataProvider.php';
session_start();
?>
<?php
if (isset($_GET['duyet']))
{   
    $sql = "UPDATE `donhang` SET `daduyet`='1' WHERE `madonhang`=".$_GET['duyet']."";
    executeQuery($sql);
    header("Location: donhang.php");
}
if (isset($_GET['daduyet']))
{   
    $sql = "UPDATE `donhang` SET `daduyet`='0' WHERE `madonhang`=".$_GET['daduyet']."";
    executeQuery($sql);
    header("Location: donhang.php");
}
$username="admin";
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} 
?>
<script>
    document.getElementById('btnDaduyet').addEventListener('click', function(event) {
        event.preventDefault();
        this.setAttribute('disabled', 'disabled');
    });
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../asset/themify-icons/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/fonts/remixicon.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark min-vh-100">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white position-fixed  min-vh-100">
                <?php              
    echo '
                <span class="fs-5 d-none d-sm-inline">Xin chào '.$username.'</span>
                ';
?>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="./donhang.php" class="nav-link px-0 align-middle">
                                <i class="ri-file-list-3-fill"></i> <span class="ms-1 d-none d-sm-inline">Đơn hàng</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./addProduct.php" class="nav-link px-0"><i class="ri-add-line"></i> <span class="d-none d-sm-inline">Thêm sản phẩm</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="./productList.php" class="nav-link px-0"><i class="ri-list-settings-line"></i> <span class="d-none d-sm-inline">Danh sách sản phẩm</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="./customer.php" class="px-0 align-middle">
                                <i class="ri-file-user-line"></i> <span class="ms-1 d-none d-sm-inline">Quản lí tài khoản</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="./index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <i class="ri-logout-box-line"></i><h3 class="fs-5 d-none d-sm-inline">Đăng xuất</h3>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col py-3" style="text-align: center; border-collapse: separate; border-radius: 15px;">
            <div class="row">
                    <div class="col-6">
                        <h3 style="text-align: left;">Lọc đơn hàng: </h3>
                    </div>
                </div>
                <br>
            <form method="POST">
                <div class="row">
                    <div class="col-2">
                        <h3 style="text-align: left;">Từ ngày:</h3>
                    </div>
                    <div class="col-2">
                        <input type="date" name="tungay" value="">
                    </div>
                    <div class="col-2">
                        <h3>Đến ngày:</h3>
                    </div>
                    <div class="col-4">
                        <input type="date"  name="denngay" value="">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h3 style="text-align: left;">Địa chỉ giao hàng : </h3>
                    </div>
                    <div class="col-4">
                    <select name="diachi" class="form-select form-select-sm" id="select-bottom" style="width: 200px;margin-right: 14px;" aria-label=".form-select-sm example"> 
                        <option value="0" selected="selected">Tất cả</option>
                        <option value="Quận 1"> Quận 1</option>
                        <option value="Quận 2"> Quận 2</option>
                        <option value="Quận 3"> Quận 3</option>
                        <option value="Quận 4"> Quận 4</option>
                        <option value="Quận 5"> Quận 5</option>
                        <option value="Quận 6"> Quận 6</option>
                        <option value="Quận 7"> Quận 7</option>
                        <option value="Quận 8"> Quận 8</option>
                        <option value="Quận 10"> Quận 10</option>
                        <option value="Quận 11"> Quận 11</option>
                        <option value="Quận Tân Bình"> Quận Tân Bình</option>
                        <option value="Quận Tân Phú"> Quận Tân Phú</option>
                        <option value="Quận Phú Nhuận"> Quận Phú Nhuân</option>
                        <option value="Quận Bình Thạnh"> Quận Bình Thạnh</option>
                        <option value="Quận Gò Vấp"> Quận Gò Vấp</option>
</select>
                    </div>
                    <div class="col-2">
                    <input type="submit" value="Xác nhận">
                    </div>
                </div>
                <form>
                <br>
                <div class="container " style="text-align: center;">
                    <div class="row">
                        <div class="col-3">
                            <h2 id="count-order"></h2>
                        </div>
                        <div class="col-3">
                        </div>
                        <div class="col-3">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-1">
                            <h6>Mã đơn hàng</h6>
                        </div>
                        <div class="col-3">
                            <h6>Địa chỉ giao hàng</h6>
                        </div>
                        <div class="col-1">
                            <h6>Tên đăng nhập</h6>
                        </div>
                        <div class="col-1">
                            <h6>Số điện thoại</h6>
                        </div>
                        <div class="col-2">
                            <h6>Ngày đặt</h6>
                        </div>
                        <div class="col-1">
                            <h6>Thanh toán</h6>
                        </div>
                        <div class="col-1">
                            <h6>Chi tiết</h6>
                        </div>
                        <div class="col-2">
                            <h6>Trạng thái</h6>
                        </div>
                    </div>
                    <hr>
                    <div id="order-list">
<?php
$sql = "SELECT * FROM `donhang` WHERE 1";
if (isset($_POST['tungay'])&&isset($_POST['denngay'])) {
$fromDate = $_POST['tungay'];
$toDate = $_POST['denngay'];
// Câu truy vấn SQL để lọc đơn hàng theo khoảng thời gian giao hàng
if ($_POST['denngay']!=""&&$_POST['tungay']!="")
    $sql.= " AND ngay >= '$fromDate' AND ngay <= '$toDate'";
if ($_POST['diachi']!='0')
    $sql.= " AND `diachi` LIKE '%" . $_POST['diachi'] . "%'";
}
$result = executeQuery($sql);
while ($row = $result -> fetch_array()){
    echo'<div class="row">';
    echo'<div class="col-1">';
    echo'<h6>'. $row['madonhang'] .'</h6>';
    echo'</div>';
    echo'<div class="col-3">';
    echo'<h6>'. $row['diachi'] .'</h6>';
    echo'</div>';
    echo'<div class="col-1">';
    echo'<h6>'. $row['tendangnhap'] .'</h6>';
    echo'</div>';
    echo'<div class="col-1">';
    echo'<h6>'. $row['sodienthoai'] .'</h6>';
    echo'</div>';
    echo'<div class="col-2">';
    echo'<h6>'. $row['ngay'] .'</h6>';
    echo'</div>';
    echo'<div class="col-1">';
    echo'<h6>'. $row['thanhtoan'] .'</h6>';
    echo'</div>';
    echo'<div class="col-1">';
    echo'<button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal_edit_'. $row["madonhang"] .'"><i class="ri-file-text-fill"></i></button>';
    echo'</div>';
    echo'<div class="col-2">';
            if ($row["daduyet"]==0)
            echo'<a href="./donhang.php?duyet='. $row["madonhang"] .'"><button type="button" class="btn btn-outline-danger btn-delete">Chờ duyệt</button></a>';
            if ($row["daduyet"]==1)
            echo'<button type="button" class="btn btn-outline-danger btn-delete" id="btnDaduyet" disabled>Đã duyệt</button>';
    echo'</div>';
    echo'</div>';
    echo'<hr>';
    
}

?>


                    </div>
                </div>
                
                <!-- <div class="total-price" style="width:650px">
                    <6 style="margin-left: 630px;width: 100px;margin: right 0px;">Total:</h5>
                </div> -->
            </div>
            
<?php
$sql = "SELECT * FROM `donhang`";
$result = executeQuery($sql);
while ($row = $result -> fetch_array()){
echo '
<div class="modal" id="myModal_edit_'.$row["madonhang"].'" style="margin-top: 2%;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 style="color:pink;">Chi tiết đơn hàng : '.$row["madonhang"].'</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="row">
                            <div class="col-1">
                                </div>
                            <div class="col-4">
                            <h5>Tên đăng nhập : '.$row["tendangnhap"].'</h5>
                            </div>
                        </div>  
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-4">
                            <h5>Số điện thoại : '.$row["sodienthoai"].'</h5>
                            </div>
                        </div> 
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Địa chỉ giao hàng : '.$row["diachi"].'</h5>
                            </div>
                        </div> 
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Ngày đặt : '.$row["ngay"].'</h5>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Hình thức thanh toán : '.$row["thanhtoan"].'</h5>
                            </div>
                        </div>        
                        <hr>
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-1">
                                <h5>Mã sách</h5>
                            </div>
                            <div class="col-4" text-align="center">
                                <h5>Tên sách</h5>
                            </div>
                            <div class="col-2">
                                <h5>Giá</h5>
                            </div>
                            <div class="col-2">
                                <h5 style="font-size:19px;">Số lượng</h5>
                            </div>
                            <div class="col-2 d-flex">
                                <h5 class="sum-cart">Tổng tiền</h5>
                            </div>
                    </div>';
$sql1 = "SELECT * FROM `chitietdonhang` WHERE `madonhang`='" . $row["madonhang"] . "'";
$result1 = executeQuery($sql1);
$sum=0;
while ($row1 = $result1 -> fetch_array()){
    $sql2 = "SELECT * FROM sach WHERE masach ='". $row1["masach"] ."'";
    $result2 = executeQuery($sql2);
    $row2 = $result2-> fetch_array();
    $sum=$sum+$row2["gia"]*$row1["soluong"];
    echo '
        <div class="row">
        <div class="col-1">
        </div>
        <div class="col-1">
            <h6>'. $row1["masach"] .'</h6>
        </div>
        <div class="col-4" text-align="center">
            <h6>'. $row2["tensach"] .'</h6>
        </div>
        <div class="col-2">
            <h6>'. $row2["gia"]/1000 .'.000đ</h6>
        </div>
        <div class="col-2">
            <h6 style="margin-left: 20px;">'. $row1["soluong"] .'</h6>
        </div>
        <div class="col-2 d-flex">
            <h6 class="sum-cart">'. $row2["gia"]*$row1["soluong"]/1000  .'.000đ</h6>
        </div>
    </div>';
}
echo '
<div class="row">
        <div class="col-1">
        </div>
        <div class="col-5">
        </div>
        <div class="col-4">
        <h4>Tổng giá trị đơn hàng: </h4>
        </div>
        <div class="col-2 d-flex">
            <h5 class="sum-cart">' . $sum/1000 .'.000đ</h5>
        </div>

    </div>';
echo '
</div>
</div>
</div>
                        
';
}
?>

                    </div>
                </div>
             </div>
</body>
</html>
<?php
require '../DataProvider.php';
session_start();
?>

<?php
if (isset($_GET['an']))
{   
    $sql = "UPDATE `sach` SET `bian`='1' WHERE `masach`=".$_GET['an']."";
    executeQuery($sql);
    header("Location: productList.php");
}
if (isset($_GET['boan']))
{   
    $sql = "UPDATE `sach` SET `bian`='0' WHERE `masach`=".$_GET['boan']."";
    executeQuery($sql);
    header("Location: productList.php");
}
if (isset($_GET['xoa']))
{   
    $sql = "DELETE FROM `sach` WHERE `masach`=".$_GET['xoa']."";
    executeQuery($sql);
    header("Location: productList.php");
}
$username="admin";
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} 
?>
<?php
	if (isset($_POST['ten']) && isset($_POST['mota']) && isset($_POST['gia']) && isset($_POST['nxb']) && isset($_POST['tacgia'])){
        $tmp_name = $_FILES["image_url"]["tmp_name"];
		$fldimageurl = "../asset/image/" . $_FILES["image_url"]["name"];
		move_uploaded_file($tmp_name, $fldimageurl);
        
		$sql = "UPDATE `sach` SET `tensach`='" . $_POST['ten'] . "'," . 
        "`maloai`='" . $_POST['type'] . "'," . 
        "`gia`='" . $_POST['gia'] . "'," . 
        "`nxb`='" . $_POST['nxb'] . "'," . 
        "`tacgia`='" . $_POST['tacgia'] . "'," . 
        "`mota`='" . $_POST['mota'] . "'," . 
        "`anh`='" . $_FILES["image_url"]["name"] . "'" . 
        " WHERE `masach` = ".$_POST['masach']."";
        if ($_FILES["image_url"]["name"]=="")
            $sql = "UPDATE `sach` SET `tensach`='" . $_POST['ten'] . "'," . 
            "`maloai`='" . $_POST['type'] . "'," . 
            "`gia`='" . $_POST['gia'] . "'," . 
            "`nxb`='" . $_POST['nxb'] . "'," . 
            "`tacgia`='" . $_POST['tacgia'] . "'," . 
            "`mota`='" . $_POST['mota'] . "'" . 
            " WHERE `masach` = ".$_POST['masach']."";
        $result=executeQuery($sql);
}
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark min-vh-100">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white position-fixed min-vh-100">
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
            <div class="col py-3" id="product-list">
                <div class="row">
                    <div class="col-12">
                    <h2>Chọn loại sản phẩm:</h2>
                    <form method="GET">
                    <select name="loai" class="form-select form-select-sm" id="select-bottom" style="width: 200px;margin-right: 14px;" aria-label=".form-select-sm example">
                        <option value="0" selected="selected">Tất cả</option>
<?php
$sql = "SELECT * FROM loaisach";
$result = executeQuery($sql);

while ($row = $result -> fetch_array())
   {
        echo '<option value="'. $row['maloai'] .'"> '. $row['tenloai'] . '</option>';
   }
?>
                    </select>
                    <button type="submit">Xác nhận</button>
                    </form>

                </div>
                </div>
                <hr>
                <?php
                    // Thực hiện câu truy vấn SQL để đếm số lượng bản ghi trong bảng sách
                    $sql = "SELECT COUNT(*) as count FROM sach";
                    $result = executeQuery($sql);
                    $count = $result->fetch_assoc()["count"];

                    // Hiển thị kết quả số lượng sản phẩm
                    echo '<div class="row">';
                    echo '<h2 id="header">Số lượng sản phẩm: ' . $count . '</h2>';
                    echo '</div>';
                ?>

                <br>
                <br>
                <div class="row">
                    <div class="col-1">
                        <h4 style="text-align:center;">ID</h4>
                    </div>
                    <div class="col-2">
                        <h4>Tên sách</h4>
                    </div>
                    <div class="col-1">
                        <h4>Hình ảnh</h4>
                    </div>
                    <div class="col-2">
                        <h4 style="text-align:center;"> Thể loại</h4>
                    </div>
                    <div class="col-1">
                        <h4> Giá bìa </h4>
                    </div>
                    <div class="col-2">
                        <h5 style="text-align:center;">NXB</h5>
                    </div>
                    <div class="col-1">
                        <h5 style="text-align:center;">Tác giả</h5>
                    </div>
                    <div class="col-2">
                        <h5>Chức năng</h5>
                    </div>
                </div>
    <?php
        // Lấy danh sách sản phẩm và loại sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
        // kiểm tra xem form có được submit hay chưa
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['loai'])) {
            // lấy giá trị của select và lưu vào biến
            $loai = $_GET['loai'];
            // xử lý dữ liệu tương ứng với giá trị lấy được
            if ($loai == 0) {
                $sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
            } else {
            // ...xử lý khi chọn giá trị khác 0
                $sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai WHERE s.maloai = " . $loai;
            }
        }
        $result = executeQuery($sql);
        $link="../asset/image/";
        // Duyệt qua danh sách sản phẩm và hiển thị thông tin tương ứng
        while($row = $result->fetch_array()) {
            echo '<hr>';
            echo '<div class="row" id="row-' . $row["masach"] . '">';
            echo '<div class="col-1" style="text-align:center;">';
            echo '<h5>' . $row["masach"] . '</h5>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5>' . $row["tensach"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<img class="card-img-top" style="width:100%;height:100%;" src="' . $link . $row["anh"] . '" alt="Book image">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5 style="text-align:center;">' . $row["tenloai"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<h5>' . number_format($row["gia"]) . '</h5>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5>' . $row["nxb"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<h5>' . $row["tacgia"] . '</h5>';
            echo '</div>';
            // echo '<div class="col-1" style="text-align:center;">';
            // echo '<h5>' . $row["soluong"] . '</h5>';
            // echo '</div>';
            echo '<div class="col-2">';
            echo '<button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal_edit_'. $row["masach"] .'">Sửa</button>&nbsp';
            if ($row["daduocban"]==1){
                if ($row["bian"]==0)
                    echo '<a href="./productList.php?an='. $row["masach"] .'"><button type="button" class="btn btn-outline-primary btn-delete">Ẩn</button></a>';
                if ($row["bian"]==1)
                    echo '<a href="./productList.php?boan='. $row["masach"] .'"><button type="button" class="btn btn-outline-dark btn-delete">Bỏ ẩn</button></a>';
                }
            else
                echo '<button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#myModal-delete'. $row["masach"] .'">Xóa</button>';
            echo '</div>';
            echo '</div>';
echo '
            <div class="modal" id="myModal-delete'. $row["masach"] .'" style="margin-top: 15%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="header-name"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <span id="modal-text">
                        Xác nhận xóa sản phẩm ?
                    </span>
                    <br>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary no-button" data-bs-dismiss="modal">Không</button>
                        <a href="./productList.php?xoa='. $row["masach"] .'"><button type="submit" class="btn btn-danger confirm-button" data-bs-dismiss="modal">Có</button></a>
                </div>
            </div>
        </div>
    </div>';


    
}

$sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
        // kiểm tra xem form có được submit hay chưa
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // lấy giá trị của select và lưu vào biến
            
            // xử lý dữ liệu tương ứng với giá trị lấy được
            if (!isset($_GET['loai'])) {
                $sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
            } else {
                $loai = $_GET['loai'];
            // ...xử lý khi chọn giá trị khác 0
                $sql = "SELECT * FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai WHERE s.maloai = " . $loai;
            }
        }
        $result = executeQuery($sql);
        while($row = $result->fetch_array()) {
        echo '
    <div class="modal" id="myModal_edit_'. $row["masach"] .'">
        <div class="modal-dialog d-flex" style="min-width: 100%;">
            <div class="container">
            <div class="modal-content" style="width:60%;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-auto col-md-3 col-xl-3 px-sm-6 px-2"  style="margin-left: 15em;">
                        <div class="d-flex flex-column align-items-center align-items-sm-center px-3 pt-2">            
                            <form style="width: 40rem;" method="POST" action="productList.php"  enctype="multipart/form-data">
                            <input type="text" class="disappear" name="masach" value="'. $row["masach"] .'">
                            <div class="row mb-3">
                            <label for="inputImg" class="col-sm-3 col-form-label">Chọn ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control img-upload" name="image_url" accept="image/png">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3"></div>
                            <div class="col-sm-3" id="image" style="margin-left: 20px;">
                            <img src="../asset/image/'. $row["anh"] .'" class="image_1" width="300" height="300">
                            </div>
                        </div>
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-3 col-form-label">Tên sách:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ten" class="form-control" id="inputName" value="'.$row["tensach"] .'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputParValue" class="col-sm-3 col-form-label">Giá :</label>
                                <div class="col-sm-9">
                                    <input type="number" name="gia" class="form-control" id="inputParValue"  value="'.$row["gia"] .'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNXB" class="col-sm-3 col-form-label">NXB:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nxb" class="form-control" id="inputNXB" value="'.$row["nxb"] .'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAuthor" class="col-sm-3 col-form-label">Tác giả:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tacgia" class="form-control" id="inputAuthor" value="'. $row["tacgia"] .'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputContent" class="col-sm-3 col-form-label">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea name="mota" class="form-control" id="inputContent" style="height: 90px;" >'. $row["mota"] .'</textarea>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Thể loại:</legend>
                            <div class="col-sm-9">
                            ';

$sql1 = "SELECT * FROM loaisach";
$result1 = executeQuery($sql1);

while ($row1 = $result1 -> fetch_array())
{
    if ($row1['maloai']!=$row['maloai'])
        echo '<div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="'.$row1['maloai'].'">
        <label class="form-check-label" for="gridRadios1">
            '.$row1['tenloai'].'
        </label>
        </div>';
    else {
        echo '<div class="form-check">
        <input class="form-check-input" type="radio" checked name="type" id="gridRadios1" value="'.$row1['maloai'].'">
        <label class="form-check-label" for="gridRadios1">
            '.$row1['tenloai'].'
        </label>
        </div>';
    }   
}   

       echo'
       </div>
       </div>
       </div>
       <button type="submit" class="btn btn-primary" id="btn-confirm">Lưu thay đổi</button>
                        </form>
                    </div>
                    </div>
            </div> 
        </div>
</div>';
        }
?>



        </div>
    </div>


<!-- modal edit -->
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script>
            const fileUpload = document.querySelectorAll('.img-upload')
            const reader = new FileReader()
            for (let i=0;i<fileUpload.length;i++) {
                fileUpload[i].addEventListener('change', (event) => {
                    var files = event.target.files;
                    var file = files[0];
                    reader.readAsDataURL(file);
                    var img = document.getElementsByClassName('image_1');
                    reader.addEventListener('load', (event) => {
                    img[i].src = event.target.result;
                    img[i].alt = file.name;
                    img[i].width = 300; // Đặt giá trị cho thuộc tính width
                    img[i].height = 300;
                });
            });
            }
        </script>

</body>
</html>
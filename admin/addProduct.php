<?php
require '../DataProvider.php';

session_start();
// Lấy giá trị của biến session
?>

<?php
	if (isset($_POST['ten']) && isset($_POST['mota']) && isset($_POST['gia']) && isset($_POST['nxb']) &&isset($_POST['tacgia']) && $_POST['ten']!=""){
        $sql = "SELECT COUNT(*) AS numrows FROM sach";
        $result = executeQuery($sql);
        $row1 = $result->fetch_array();
        $numrows = $row1['numrows']+1;
		$tmp_name = $_FILES["image_url"]["tmp_name"];
		$fldimageurl = "../asset/image/" . $_FILES["image_url"]["name"];
		move_uploaded_file($tmp_name, $fldimageurl);
		// echo($fldimageurl);
		// echo($_FILES["image_url"]["name"]);
		$sql = "INSERT INTO `sach`(`masach`, `tensach`, `maloai`, `gia`, `nxb`, `tacgia`, `mota`, `bian`,`daduocban`, `anh`) VALUES (" .
				"'" . $numrows . "'," . 
				"'" . $_POST['ten'] . "'," . 
				"'" . $_POST['gridRadios'] . "'," . 
				"'" . $_POST['gia'] . "'," . 
				"'" . $_POST['nxb'] . "'," . 
				"'" . $_POST['tacgia'] . "'," . 
				"'" . $_POST['mota'] . "'," . 
				"'0'," . 
                "'0'," . 
				"'" . $_FILES["image_url"]["name"] ."')";
                $result=executeQuery($sql);
                } 
                $username="admin";
                if (isset($_SESSION['user'])) {
                    $username = $_SESSION['user'];
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/fonts/remixicon.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../asset/themify-icons/themify-icons.css" rel="stylesheet">
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
    <link rel="stylesheet" href="../asset/fonts/remixicon.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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
                                <i class="ri-file-user-line"></i> <span class="ms-1 d-none d-sm-inline"> Quản lí tài khoản</span> </a>
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
                <div class="col-auto col-md-3 col-xl-3 px-sm-6 px-2 min-vh-100">
                    <div class="d-flex flex-column align-items-center align-items-sm-center px-3 pt-2 position-fixed min-vh-100">            
                    <form style="width: 40rem;" action='addProduct.php' method='post'  enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputImg" class="col-sm-3 col-form-label">Chọn ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="img-upload" name="image_url" accept="image/png">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3"></div>
                            <div class="col-sm-3" id="image" style="margin-left: 20px;">
                            <img id="image_1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputName" class="col-sm-3 col-form-label">Tên sách:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName" name="ten">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-3 col-form-label">Giá :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputPrice" name="gia">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-3 col-form-label">NXB:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNXB" name="nxb">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-3 col-form-label">Tác giả:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAuthor" name="tacgia">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-3 col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="inputContent" style="height: 90px;" name="mota"></textarea>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-3 pt-0">Thể loại:</legend>
                        <div class="col-sm-9">
                        <?php

$sql = "SELECT * FROM loaisach";
$result = executeQuery($sql);

while ($row = $result -> fetch_array())
   {
        echo '<div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="'. $row['maloai'] .'">
        <label class="form-check-label" for="gridRadios1">
        '. $row['tenloai'] .'
        </label>
    </div>';
   }
?>     
                        <button type="submit" class="btn btn-primary" id="btn-confirm">Xác nhận</button>
                    </form>
                </div>
            </div>
            <div class="container-fluid" id="product">
                
            </div>
        </div> 
    </div>
    <div class="modal" id="myModal" style="margin-top: 30px;">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row" id="modal-content">
                    
                            <!-- <div class="col-1">

                            </div> -->

                            

                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>

    <script>
        const fileUpload = document.querySelector('#img-upload')
        const inputName=document.querySelector('#inputName')
        const inputPrice=document.querySelector('#inputPrice')
        const inputNXB=document.querySelector('#inputNXB')
        const inputContent=document.querySelector("#inputContent")
        const inputAuthor=document.querySelector('#inputAuthor')
        const gridRadios=document.getElementsByName('gridRadios')
        const btnConfirm=document.querySelector('#btn-confirm')
        const reader = new FileReader()
    btnConfirm.addEventListener('click',function(){
        if (inputName.value==''||inputParValue.value==''||inputPrice.value==''||radios=='')
            alert('Vui lòng nhập đầy đủ thông tin')
            location.href = "addProduct.php"
    })
    fileUpload.addEventListener('change', (event) => {
    var files = event.target.files;
    var file = files[0];
    reader.readAsDataURL(file);
    let img
    var imageDiv = document.getElementById('image');
    reader.addEventListener('load', (event) => {
      img = document.getElementById('image_1');
      img.src = event.target.result;
      img.alt = file.name;
      img.width = 150; // Đặt giá trị cho thuộc tính width
      img.height = 150;
    });
  });
    </script>
</body>
</html>
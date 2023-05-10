<?php
session_start();
// include"DataProvider.php"; 
require 'DataProvider.php'

if (isset($_POST['username']) && isset($_POST['password']))
{
    function validate ($data) 
    {
        $data = trim ($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }
}

$username = validate ($_POST['username']);
$pass = validate ($_POST['password'])

if(empty($username))
{
    header ("Location: login.php");
    exit();
}
else if (empty($pass))
{
    header ("Location: login.php");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$username' AND password = '$pass'";

$result =  mysqli_query($sql);

if (mysqli_num_rows($result) === 1)
{
    $row = mysqli_fetch_assoc ($result); 
    if($row['user_name']===$username && $row['password']===$pass)
    {
        echo "Đăng nhập!";
        $_SESSION['user_name'] = $row['user_name']; 
        $_SESSION['name'] = $row['name']; 
        $_SESSION['id'] = $row['id']; 
        header ("Location: login.php");
        exit(); 
    }
    else 
    {
        header ("Location: login.php?error=Tên người dùng hoặc mật khẩu không đúng!");
        exit();
    }
}
else
{
    header ("Location: login.php");
    exit();
}
?>
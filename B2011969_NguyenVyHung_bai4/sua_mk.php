<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Thực hiện truy vấn
$id =$_COOKIE["id"];
// $sql = "UPDATE customers set password = '".md5($_POST["new_password"])."'";
$sql_2 = "select * from customers where id = '$id'";

$reault =$conn->query($sql_2);

$result_all=$reault->fetch_all();

  $pw=$result_all[0][5];



if (isset($_POST['submit'])){

  // Lấy dữ liệu từ form
  $old_password = $_POST["old_password"];
  $new_password = $_POST["new_password"];
  $confirm_password = $_POST["confirm_password"];

 
  // $old_password_from_db = "SELECT password FROM customers"; // Lấy mật khẩu cũ từ CSDL
  $istrue=true;
  if (md5($old_password) != $pw) {
    $istrue=false;
  } else if($new_password !=$confirm_password){
    $istrue=false;
  }
  else if($istrue){
    
    $sql_2="UPDATE `customers` SET `password` = '".md5($new_password)."' WHERE `customers`.`id` = $id ";

    if($conn->query($sql_2)==true){
      echo "update success";
    }
    else{
      echo "loi ".$conn->error;
    }
  }
} 

$conn->close();
?>
<?php
$host="localhost"; // กำหนด host
$username="root"; // กำหนด username
$password=""; // กำหนด Password
$db="data"; // กำหนดชื่อฐานข้อมูล
$tb = "register"; //ชื่อตาราง
$connect = mysqli_connect( $host,$username,$password) or die ("Database connection failed");// ติดต่อฐานข้อมูล
if (!$connect) {
    die("Database connection failed");
}
$db_select = mysqli_select_db($connect, $db);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($connect));
}

// print_r($_POST);
if(isset($_POST['Add'])) {
    $UserID = $_POST['UserID'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $CreditLimit = $_POST['CreditLimit'];
    $Address = $_POST['Address'];
// เพิ่มลงฐานข้อมูล
$sql = "insert into $tb (UserID ,password , name , phone,CreditLimit,Address) VALUES ('$UserID','$password','$name', '$phone','$CreditLimit','$Address')";
//$connect->query($sql) or die ($connect->error . "<br>$sql");

$dbquery  = mysqli_query($connect,$sql) or die("Insert Error");
echo "เพิ่มข้อมูลของ $UserID สำเร็จแล้ว";
//-->
}

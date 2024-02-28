<?php 

//ถ้าผู้ใช้เข้าหน้า connect มันจะลิ้งค์ไปที่หน้า login ทันที เพื่อป้องกันข้อมูล
if($open_connect != 1){
    die(header('Location: from-login.php'));
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'roomcart';
$port = NULL;
$socket = NULL;
$connect = mysqli_connect($hostname, $username, $password, $database);

if(!$connect) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว : " . mysqli_connect_error());
}else{

// Set charset
mysqli_set_charset($connect, 'utf8');
}
?>
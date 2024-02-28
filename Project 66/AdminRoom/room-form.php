<?php
session_start();
include 'config.php';

$room_name = trim($_POST['room_name']);
$price = $_POST['price'] ?:0;
$detail = trim($_POST['detail']);
$image_name = $_FILES['profile_image']['name'];

$image_tmp = $_FILES['profile_image']['tmp_name'];
$folder = 'upload_image/';
$image_location = $folder . $image_name;


//update รูปภาพใหม่แล้วลบภาพเก่าออกด้วย

if (empty($_POST['id'])) {
    $query = mysqli_query($conn, "INSERT INTO rooms (room_name, price, profile_image, detail) VALUES ('{$room_name}', '{$price}', '{$image_name}', '{$detail}')") or die('query failed');
} else {
    $query_room = mysqli_query($conn,"SELECT * FROM rooms WHERE id = '{$_POST['id']}'");
    $result = mysqli_fetch_assoc($query_room);

    if(empty($image_name)) {
        $image_name = $result['profile_image'];
    } else {
        @unlink($folder . $result['profile_image']); 
    }

    $query = mysqli_query($conn, "UPDATE rooms SET room_name='{$room_name}',price='{$price}', profile_image='{$image_name}',detail='{$detail}' WHERE id='{$_POST['id']}'") or die('query failed');
}

//mysql_close($conn);
if($query) {
    move_uploaded_file($image_tmp, $image_location);

    $_SESSION['message'] = 'Room Saved success';
    header('location: ' . $base_url . '/index.php');
} else {
    $_SESSION['message'] = 'Room could not be saved!';
    header('location: ' . $base_url . '/index.php');
}
<?php
session_start();
include 'config.php';

$now = date('Y-m-d H:i:s');
$query = mysqli_query($conn, "INSERT INTO orders (order_date, fullname, email, tell, grand_total) VALUES ('{$now}', '{$_POST['fullname']}', '{$_POST['email']}', '{$_POST['tell']}', '{$_POST['grand_total']}')") or die('query failed');

if($query) {
    $last_id = mysqli_insert_id($conn);
    foreach($_SESSION['cart'] as $roomId => $roomQty) {
        $room_name = $_POST['$room']['$roomId']['name'];
        $price = $_POST['$room']['$roomId']['price'];
        $total = $price * $roomQty;

    mysqli_query($conn, "INSERT INTO order_detalls (order_id, room_id, room_name, price, quantity, total) VALUES ('{$last_id}', '{$roomId}', '{$room_name}', '{$price}', '{$roomQty}', '{$total}')") or die('query failed');
    }
    
    unset($_SESSION['cart']);
    $_SESSION['message'] = 'Checkout order success!';
    header('location: ' . $base_url . '/checkout-success.php');
} else {
    $_SESSION['message'] = 'Checkout not complete!!!';
    header('location: ' . $base_url . '/checkout-success.php');

    
}
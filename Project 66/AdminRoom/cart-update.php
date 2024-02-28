<?php
session_start();
include 'config.php';

foreach($_SESSION['cart'] as $roomId => $roomQty) {
    $_SESSION['cart'][$roomId] = $_POST['room'][$roomId]['quantity'];
}
$_SESSION['message'] = 'Cart update success';
header('location: ' . $base_url . '/cart.php');

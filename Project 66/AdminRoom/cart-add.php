<?php
session_start();
include 'config.php';

if (!empty($_GET['id'])) {
    if(empty($_SESSION['cart'][$_GET['id']])) {
        $_SESSION['cart'][$_GET['id']] = 1;
    } else {
        $_SESSION['cart'][$_GET['id']] += 1;
    }

    $_SESSION['message'] = 'เพิ่มในรายการจองห้องพักเรียบร้อย (ตรวจสอบรายการที่หน้า สถานะการจอง)';
}

header('location: ' . $base_url . '/room-list.php');

<?php 
session_start();
include 'config.php';

if (!empty($_GET['id'])) {
    $query_room = mysqli_query($conn,"SELECT * FROM rooms WHERE id = '{$_GET['id']}'");
    $result = mysqli_fetch_assoc($query_room);
    @unlink('upload_image/' . $result['profile_image']);

    $query = mysqli_query($conn,"DELETE FROM rooms WHERE id='{$_GET['id']}'") or die('query failed');
    //mysql_close($conn);

    if ($query) {
        $_SESSION['message'] = 'Room Deleted success';
        header('location: ' . $base_url . '/index.php');
    } else {
        $_SESSION['message'] = 'Room could noe be deleted!';
        header('location: ' . $base_url . '/index.php');
    }
} 
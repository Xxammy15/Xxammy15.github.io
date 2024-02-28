<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/index.php">จัดการห้องพัก</a>
        <a class="nav-link" href="<?php echo $base_url; ?>/admin-data-customer.php">ข้อมูลลูกค้า</a>
        <a class="nav-link" href="<?php echo $base_url; ?>/admin-data.php">ข้อมูลแอดมิน</a>
        <a class="nav-link" href="<?php echo $base_url; ?>/form-login.php">ออกจากระบบ</a>
      </div>
    </div>
  </div>
</nav>
</head>

<body class="bg-body-tertiary" >
   
    
    

    
</body>

</html>
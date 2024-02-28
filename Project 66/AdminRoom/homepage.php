<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('pomotion.jpg');
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Do not repeat the background image */
        }
    </style>
</head>

<body class="bg-body-tertiary">
    <?php include 'menu.php'; ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t1.15752-9/427867000_408840191684348_3513746992326269714_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeHWDx2zkYMKkehvyJXPw4AtXvtCq2sxlrVe-0KrazGWtUbzxRadKXu_GSIBm18hYoP-z5hhysSKqEYpbF8TgkKG&_nc_ohc=7tVKKdRAPWQAX-x76JO&_nc_ht=scontent-bkk1-1.xx&oh=03_AdRCtqngRTwZFSIbvMB9XzxqoqjwcSRuTZ3SxKwHXRKtag&oe=65FBC284" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>

</html>

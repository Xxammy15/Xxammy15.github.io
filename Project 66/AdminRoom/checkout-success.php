<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result Orders</title>

  <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
  <?php include 'menu.php'; ?>
  <div class="container" style="margin-top: 30px;">
    <?php if (!empty($_SESSION['message"'])): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-labela="close"></button>
      </div>
      <?php unset($_SESSION[' message']); ?>
    <?php endif; ?>

    <h6>การจองสำเร็จ ขอบคุณที่ใช้บริการ</h6>

  </div>
  <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>

</html>
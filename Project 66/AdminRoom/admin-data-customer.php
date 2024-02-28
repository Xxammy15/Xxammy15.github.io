
<?php
session_start();
include 'config.php';

$roomIds = [];
foreach(($_SESSION['cart'] ?? []) as $cartId => $cartValue) {
  $roomIds[] = $cartId;
}

$ids = 0;
if(count($roomIds) > 0) {
  $ids = implode(', ', $roomIds);
}

$query = mysqli_query($conn, "SELECT * FROM rooms WHERE id IN ($ids)");
$rows = mysqli_num_rows($query);
//$rows = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;




// Fetch all rooms
$query = mysqli_query($conn, "SELECT * FROM rooms WHERE id IN ($ids)");
$rows = mysqli_num_rows($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลลูกค้า</title>

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
<body class="bg-body-tertiary">
    
<div class="col-md-6 col-lg-5 order-md-last mx-auto">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">ข้อมูลการจองของลูกค้า</span>
                            <span class="badge bg-primary rounded-pill"><?php echo $rows; ?></span>
                        </h4>

                        <!-- ส่วนของยอดสินค้า -->
                        <?php if($rows > 0): ?>
                        <ul class="list-group mb-3">
                            <?php $grand_total = 0; ?>
                            <?php while($room = mysqli_fetch_assoc($query)): ?>
                            <li class="list-group-item d-flex justify-content-between Ih-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $room['room_name']; ?> (<?php echo $_SESSION['cart'][$room['id']]; ?>)</h6>
                                    <small class="text-body-secondary"><?php echo nl2br($room['detail']); ?></small>
                                    <input type="hidden" name="room[<?php echo $room['id']; ?>][price]" value="<?php echo $room['price']; ?>">
                                    <input type="hidden" name="room[<?php echo $room['id']; ?>][name]" value="<?php echo $room['room_name']; ?>">
                                </div>
                                <span class="text-body-secondary">฿<?php echo number_format($_SESSION['cart'][$room['id']] * $room['price'], 2); ?></span>
                            </li>
                                <?php $grand_total += $_SESSION['cart'][$room['id']] * $room['price']; ?>
                                <?php endwhile; ?>
                            <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                                <div class="text-success">
                                <h6 class="my-0">Grand Total</h6>
                                <small>amount</small>
                                </div>
                                <spanclass="text-success"><strong>฿<?php echo number_format($grand_total,2); ?></strong></span>
                            </li>
                        </ul>
                        <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                        <?php endif; ?>
</div>

    
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>

</html>
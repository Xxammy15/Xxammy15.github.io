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

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูล</title>

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

        <h4 class="mb-3">กรอกข้อมูล</h4>
            <form action="<?php echo $base_url; ?>/checkout-from.php" method="post">
                <div class="row g-5">
                    <div class="col-md-6 col-1g-7">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label">ชื่อ-นามสกุล / Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="" value="">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">เบอร์โทรศัพท์ / Tel.</label>
                                <input type="text" name="tel" class="form-control" placeholder="" value="">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="" value="">
                            </div>

                            <div class="col-12">
                                <label for="formFile">อัพโหลดสลิปยืนยันการโอนเงิน</label>
                                <input type="file" name="_image" class="form-control" accept="image/png, image/jpg, image/jpeg">
                        </div>

                            <hr class="my-4">
                            <div class="text-end">
                                <a href="<?php echo $base_url; ?>/room-list.php" class="btn btn-secondary btn-1g" role="button">กลับไปหน้ารายการห้องพัก</a>
                                <button class="btn btn-primary btn-1g" type="submit">ยืนยันการจอง</button>
                            </div>
                        </div>


                        <div class="card" style="width: 18rem;">
  <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t1.15752-9/262773876_3138086636475349_7698134041632402574_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEWQ9QBtDHXpKVIUfUbtHX8VrV493I4_SxWtXj3cjj9LFXBqT3lgtTPv2K_x_Mgarg94bgZHT78LRhau1wmx73r&_nc_ohc=Fw4lfyWDAKoAX-yW-hr&_nc_ht=scontent-bkk1-1.xx&oh=03_AdTZtP6nk7e9vbNWtlNN4favFIzhGTsvJrpzlTaC5nJt5A&oe=65FB9743" class="card-img-top" alt="...">
  <div class="card-body">
    
  </div>
</div>
<br>
<br>

                        
                        <div class="col-md-6 col-1g-5 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">สรุปรายการการจองที่พัก/จุดนั่งพัก</span>
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
                    </div>
                </div>
            </form>

    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>

</html>
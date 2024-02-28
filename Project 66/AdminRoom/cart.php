<?php
session_start();
include 'config.php';

$roomIds = [];
foreach (($_SESSION['cart'] ?? []) as $cartid => $cartQty) {
    $roomIds[] = $cartid;
}

$ids = 0;
if (count($roomIds) > 0) {
    $ids = implode(',', $roomIds);
}


// Fetch all rooms
$query = mysqli_query($conn, "SELECT * FROM rooms WHERE id IN ($ids)");
$rows = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <?php include 'menu.php'; ?>
    <div class="container" style="margin-top: 30px">
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:aqua;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <h4>รายการที่ต้องการจอง</h4>
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $base_url; ?>/cart-update.php" method="post">
                <table class="table table-bordered border-info">
                    <thead>
                        <tr>
                            <th style="width: 100px">Image</th>
                            <th>Room name</th>
                            <th style="width: 200px">ราคา</th>
                            <th style="width: 100px">จำนวนคืน</th>
                            <th style="width: 200px">ราคารวม</th>
                            <th style="width: 120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($rows > 0): ?>
                            <?php while ($room = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($room['profile_image'])): ?>
                                            <img src="<?php echo $base_url; ?>/upload_image/<?php echo $room['profile_image']; ?>"
                                                width="100" alt="Room Image">
                                        <?php else: ?>
                                            <img src="<?php echo $base_url; ?>/assets/images/<?php echo $room['profile_image']; ?>"
                                                width="100" alt="Room Image">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo $room['room_name']; ?>
                                        <div>
                                            <small class="text-muted">
                                                <?php echo nl2br($room['detail']); ?>
                                            </small>
                                        </div>
                                    </td>
                                    
                                    <td><?php echo number_format($room['price'], 2); ?></td>
                                    <td><input type="number" name="room[<?php echo $room['id']; ?>][quantity]" value="<?php echo $_SESSION['cart'][$room['id']]; ?>" class="form-control"></td>
                                    <td><?php echo number_format($room['price'] * $_SESSION['cart'][$room['id']], 2); ?></td>
                                    
                                    <!-- ปุ่ม Delete -->
                                    <td>
                                        
                                            <a onclick="return confirm('Are your sure you want to delete?');" role="button"
                                                href="<?php echo $base_url; ?>/cart-delete.php?id=<?php echo $room['id']; ?>"
                                                class="btn btn-outline-danger">
                                                <i class="fa-solid fa-pen-to-square"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="6" class="text-end">
                                <button type="submit" class="btn btn-lg btn-success">ตรวจสอบรายการ</button>
                                    <a href="<?php echo $base_url; ?>/customer.php" class="btn btn-lg btn-primary">ยืนยัน เพื่อไปหน้ากรอกข้อมูล</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">
                                    <h4 class="text-center text-danger">ไม่มีห้องพักในรายการจอง</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        // Add an event listener to all elements with the class 'editLink'
        var editLinks = document.querySelectorAll('.editLink');
        editLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                // Change the background color to white
                this.style.backgroundColor = 'white';
            });
        });
    </script>
</body>

</html>
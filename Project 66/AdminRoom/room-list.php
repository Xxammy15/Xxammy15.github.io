<?php
session_start();
include 'config.php';

// Fetch all rooms
$query = mysqli_query($conn, "SELECT * FROM rooms");
$rows = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>

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

    
    <div class="container" style="margin-top: 30px">
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:aqua;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php $counter = 0; ?>
    <?php while ($room = mysqli_fetch_array($query)) : ?>
        <?php if ($counter % 3 == 0): ?>
            <div class="row mb-3">
        <?php endif; ?>
        
        <!-- card ของแต่ละห้อง -->
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 20rem;">
                <?php if (!empty($room['profile_image'])): ?>
                    <img src="<?php echo $base_url;?>/upload_image/<?php echo $room['profile_image'];?>" class="card-img-top" width="100" alt="Room Image">
                <?php else: ?>
                    <img src="<?php echo $base_url;?>/assets/images/no-image.png" class="card-img-top" width="100" alt="Room Image">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $room['room_name']; ?></h5>
                    <p class="card-text text-success fw-bold mb-0"><?php echo number_format($room['price'], 2); ?> Baht</p>
                    <p class="card-text text-muted"><?php echo nl2br($room['detail']); ?></p>
                    <a href="<?php echo $base_url; ?>/cart-add.php?id=<?php echo $room['id']; ?>" class="btn btn-warning w-100"><i class="fa-solid fa-cart-plus me-1"></i>กดจอง</a>
                </div>
            </div>
        </div>

        <?php if ($counter % 3 == 2 || $counter == $rows - 1): ?>
            </div>
        <?php endif; ?>
        
        <?php $counter++; ?>
    <?php endwhile; ?>

    <?php if ($rows == 0): ?>
        <div class="row">
            <div class="col-12">
                <h4 class="text-danger">ไม่มีห้องว่าง</h4>
            </div>
        </div>
    <?php endif; ?>
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
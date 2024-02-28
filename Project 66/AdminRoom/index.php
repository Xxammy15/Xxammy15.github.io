<?php
session_start();
include 'config.php';

// Fetch all rooms
$query = mysqli_query($conn, "SELECT * FROM rooms");
$rows = mysqli_num_rows($query);

//var room from
$result = [
    'id' => '',
    'room_name' => '',
    'price' => '',
    'detail' => '',
    'room_image' => '',

];

// Room select edit
if  (!empty($_GET['id'])) {
    $query_room = mysqli_query($conn,"SELECT * FROM rooms WHERE id = '{$_GET['id']}'");
    $row_room = mysqli_num_rows($query_room);

    if ($row_room == 0) {
        header('location:' . $base_url . '/index.php');
    }

    $result = mysqli_fetch_assoc($query_room);

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการห้องพัก</title>

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
    
    <div class="container" style="margin-top: 30px">
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:aqua;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <h4>เพิ่ม / แก้ไขห้องพัก</h4>
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action="<?php echo $base_url; ?>/room-form.php" method="post" enctype="multipart/form-data">
                    <input tpye="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Room Name</label>
                            <input type="text" name="room_name" class="form-control" value="<?php echo $result['room_name']; ?>">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $result['price']; ?>">
                        </div>

                        <div class="col-sm-6">
                            <?php if(!empty($result['profile_image'])): ?>
                                <div>
                                <img src="<?php echo $base_url;?>/upload_image/<?php echo $result['profile_image'];?>" width="100" alt="Room Image">
                                </div>
                            <?php endif; ?>
                            <label for="formFile">Image</label>
                            <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpg, image/jpeg">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Detail</label>
                            <textarea name="detail" class="form-control" rows="3"><?php echo $result['detail']; ?></textarea>
                        </div>
                    </div>

                    <!-- ปุ่ม Create and Cancel -->
                    <?php if(empty($result['id'])): ?>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-floppy-disk me-1"></i>Create</button>
                    <?php else: ?>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-floppy-disk me-1"></i>Update</button>
                    <?php endif; ?>

                    <a role="button" class="btn btn-secondary" href="<?php echo $base_url; ?>/index.php"><i class="fas fa-floppy-disk me-1"><i class="fa-solid fa-rotate-left me-1"></i>Cancel</a>
                    <hr class="my-4">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered border-info">
                    <thead>
                        <tr>
                            <th style="width: 100px">Image</th>
                            <th>Room name</th>
                            <th style="width: 200px">Price</th>
                            <th style="width: 200px">Total</th>
                            <th style="width: 180px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($rows > 0): ?>
    <?php while ($room = mysqli_fetch_array($query)) : ?>
        <tr>
            <td>
                <?php if (!empty($room['profile_image'])): ?>
                    <img src="<?php echo $base_url;?>/upload_image/<?php echo $room['profile_image'];?>" width="100" alt="Room Image">
                <?php else: ?>
                    <img src="<?php echo $base_url;?>/assets/images/<?php echo $room['profile_image'];?>" width="100" alt="Room Image">
                <?php endif; ?>
            </td>
            <td><?php echo $room['room_name']; ?>
                <div>
                    <small class="text-muted"><?php echo nl2br($room['detail']); ?></small>
                </div>
            </td>
            <td><?php echo $room['price']; ?></td>
            <td><?php echo number_format($room['price'], 2); ?></td>
            <td>

            <!-- ปุ่ม edit and Delete -->
            <a role="button" href="<?php echo $base_url; ?>/index.php?id=<?php echo $room['id']; ?>" class="btn btn-outline-success">
            <i class="fa-solid fa-pen-to-square"></i>Edit</a>
            <a onclick="return confirm('Are your sure you want to delete?');" role="button" href="<?php echo $base_url; ?>/room-delete.php?id=<?php echo $room['id']; ?>" class="btn btn-outline-danger">
    <i class="fa-solid fa-pen-to-square"></i>Delete
</a>


            </td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="5"><h4 class="text-center text-danger">No room listings available</h4></td>
    </tr>
<?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
    // Add an event listener to all elements with the class 'editLink'
    var editLinks = document.querySelectorAll('.editLink');
    editLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Change the background color to white
            this.style.backgroundColor = 'white';
        });
    });
</script>
</body>

</html>

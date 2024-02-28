<header class="d-flex justify-content-center py-3 sticky-top bg-light border-bottom shadow-sm">


<div>
    <img src="upload_image/banner3.png" alt="Banner"> 

    <!-- <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo $base_url; ?>/index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="<?php echo $base_url; ?>/room-list.php" class="nav-link">Room List</a></li>
        <li class="nav-item"><a href="<?php echo $base_url; ?>/cart.php" class="nav-link">Cart </a></li>
        <li class="nav-item"><a href="<?php echo $base_url; ?>/homepage.php" class="nav-link">Homepage </a></li>
    </ul> -->

    <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ไร่จ๋าคุณ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/homepage.php">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/room-list.php">จองห้องพัก/จุดกางเต็นท์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/cart.php">สถานะการจอง(<?php echo count($_SESSION['cart'] ?? []) ?>)</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/customer.php">ข้อมูลการจอง</a>
        </li>
      </ul>
      <form class="d-flex">
        
        <button class="nav-item"><a href="<?php echo $base_url; ?>/form-login.php" class="nav-link">Login</button>
      </form>
    </div>
  </div>
</nav>

</div>


</header>

<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">
</head>
<body>

   <div class="block-content">
      <i class="fa-solid fa-users-gear"></i>
      <h2>LOGIN</h2>
      <span>เข้าสู่ระบบ</span>
      <form method="POST" action="process-login.php">
         <div class="form-inner">
               <label for="username">ชื่อผู้ใช้ / Username :</label>
               <input type="text" name="username_account" placeholder="ชื่อผู้ใช้" required><br>
               
               <label for="password">รหัสผ่าน / Password :</label>
               <input type="password" name="password_account" placeholder="รหัสผ่าน" required><br>
         </div>     

         <div class="form-submit">
               <input type="submit" value="เข้าสู่ระบบ">
               <a href="<?php echo $base_url; ?>/form-register.php">สมัครสมาชิก</a>
         </div>
      </form>
   </div>
</body>
</html>

<style>
    body {
    background-image: url('https://images.unsplash.com/photo-1602391833977-358a52198938?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

.block-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    margin-top: 180px;
    background-color: rgba(255, 255, 255, 0.5); /* ปรับค่า opacity เพื่อให้เนื้อหาภายในเป็นความเข้มหรือไม่เบลอ */
    border-radius: 10px; /* จัดรูปแบบกรอบให้สวยงาม */
    padding: 20px; /* เพิ่มระยะห่างภายในพื้นที่ของ block-content */
}

   
   .block-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;      
      /* width: 30%; */
      margin: 0 auto;
      margin-top: 180px;
   }

   i.fa-solid.fa-users-gear {
      font-size: 50px;
      color: black;
   }

   .block-content h2{
      font-family: Sarabun;
      font-size: 30px;
      margin: 0;
   }

   .block-content span{
      font-family: Sarabun;
      font-size: 20px;
      margin-bottom: 30px;
   }

   .form-inner {
      display: flex;
      flex-direction: column;
   }

   .form-inner label{
      font-family: Sarabun;
      font-size: 18px;
   }
   
   .form-inner input{
      height: 30px;
      width: 100%;
      font-size: 16px;
      font-family: Sarabun;
   }

   .form-submit input{
      font-family: 'Sarabun';
      font-size: 20px;
      background: yellow;
      color: black;
      border: 0;
      padding: 10px;
      border-radius: 8px;
   }

   .form-submit a{
      color: black;
      font-family: Sarabun;
      text-decoration: none;
   }

   .form-submit {
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
   }
</style>
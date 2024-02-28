<?php
// เชื่อมต่อกับฐานข้อมูล
include 'config.php';

// ตรวจสอบว่ามีการส่งข้อมูลผ่านวิธี POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $username = mysqli_real_escape_string($conn, $_POST['username_account']);
    $email = mysqli_real_escape_string($conn, $_POST['email_account']);
    $password = mysqli_real_escape_string($conn, $_POST['password_account']); // รหัสผ่านเพียงตัวเดียว

    // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูลผู้ใช้ลงในฐานข้อมูล
    $sql = "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // ถ้าบันทึกข้อมูลสำเร็จ
        echo "บันทึกข้อมูลเรียบร้อยแล้ว";
    } else {
        // ถ้าเกิดข้อผิดพลาดในการบันทึกข้อมูล
        echo "ข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีใหม่</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/fontawesome/css/solid.min.css" rel="stylesheet">
</head>
<body>
   
<div class="block-content">
    <i class="fa-solid fa-users-gear"></i>
    <h2>Register</h2>
    <span>สร้างบัญชีใหม่</span>
    <form method="POST" action="<?php echo $base_url; ?>/process-register.php">
        <div class="form-inner">
            <label for="username">ชื่อผู้ใช้ / Username :</label>
            <input type="text" name="username_account" placeholder="ชื่อผู้ใช้" required><br>

            <label for="email">E-mail</label>
            <input type="email" name="email_account" placeholder="email" required><br>
               
            <label for="password">รหัสผ่านใหม่ / New password :</label>
            <input type="password" name="password_account" placeholder="รหัสผ่านใหม่" required><br>

            <label for="password">ยืนยันรหัสผ่าน / Confirm password :</label>
            <input type="password" name="password_account2" placeholder="ยืนยันรหัสผ่าน" required><br>
        </div>     

        <div class="form-submit">
            <button type="submit">สร้างบัญชี</button>
            <a href="<?php echo $base_url; ?>/form-login.php">กดที่นี่เมื่อมีบัญชีแล้ว</a>
        </div>
    </form>
</div>
</body>
</html>

<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1631635589499-afd87d52bf64?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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

    .form-submit button{
        font-family: 'Sarabun';
        font-size: 20px;
        background: red;
        color: black;
        border: 0;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer; /* Add cursor pointer to indicate it's clickable */
    }

    .form-submit a{
        color: black;
        font-family: Sarabun;
        text-decoration: none;
        margin-top: 10px; /* Add margin top for some spacing */
    }

    .form-submit {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
</style>

<?php
session_start();
include_once('functions.php');

$userdata = new DB_con();

if (isset($_POST['login'])) {
    $uname = $_POST['admin_name'];
    $password = ($_POST['admin_phone']);

    $result = $userdata->signin($uname, $password);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        $_SESSION['admin_phone'] = $num['admin_phone'];
        // echo "<script>alert('รหัสถูกต้อง เข้าสู่ระบบเรียบร้อยค่ะ!');</script>";
        echo "<script>window.location.href='parcel_data.php'</script>";
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>หน้าเข้าสู่ระบบ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <h1><font color="white">ระบบจัดการข้อมูลพัสดุ มหาวิทยาลัยราชภัฏมหาสารคาม</font></h1>
    </center>
    <form class="box" action="signin.php" method="post">
        <h1>เข้าสู่ระบบ</h1>
        <input type="text" name="admin_name" placeholder="ชื่อผู้ใช้" required>
        <input type="password" name="admin_phone" placeholder="รหัสผ่าน" required>
        <input type="submit" name="login" value="เข้าสู่ระบบ">
    </form>

</body>

</html>
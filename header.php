<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    h1 {text-align: center;}
    /* body {background-color: #33FFDD;} */
  </style>
</head>
<body>
  <!-- <img src="image/logo.png" width="120"  height="120"> -->
  <h1>ระบบจัดการข้อมูลพัสดุ มหาวิทยาลัยราชภัฏมหาสารคาม</h1>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="parcel_data.php">จัดการข้อมูลพัสดุ</a></li>
        <li><a href="send_data.php">จัดการข้อมูลการจ่ายพัสดุ</a></li>
        <li><a href="user_data.php">จัดการข้อมูลบุคลากร</a></li>
        <li><a href="major_data.php">จัดการข้อมูลสาขาวิชา</a></li>
        <li><a href="faculty_data.php">จัดการข้อมูลคณะ</a></li>
        <li><a href="messenger_data.php">จัดการผู้ขนส่งพัสดุ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <li><a href="logout.php" onclick="return confirm('ยืนยันการออกจากระบบ?')" class="glyphicon glyphicon-log-in"> ออกจากระบบ</a></li>
      </ul>
    </div>
  </nav>
</body>

</html>
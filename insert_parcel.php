<?php

include_once('functions.php');
include('server.php');
$insertparcel = new DB_con();
$query = "SELECT * FROM td_faculty ORDER BY faculty_id asc";
$result = mysqli_query($conn, $query);
$sqli = "SELECT * FROM td_messenger";
$query1 = mysqli_query($conn, $sqli);
if (isset($_POST['insertparcel'])) {
    $messenger_id = $_POST['messenger_id'];
    $user_id = $_POST['user_id'];
    $admin_id = $_POST['admin_id'];
    $name_messenger = $_POST['name_messenger'];
    $phone_messenger = $_POST['phone_messenger'];
    $type_id = $_POST['type_id'];
    $major_id = $_POST['major_id'];
    $recipient_name = $_POST['recipient_name'];
    $recipient_phone = $_POST['recipient_phone'];
    $recipient_status = $_POST['recipient_status'];

    $sql = $insertparcel->insertparcel($messenger_id, $user_id, $admin_id, $name_messenger, $phone_messenger, $type_id, $major_id, $recipient_name, $recipient_phone, $recipient_status);

    if ($sql) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='parceldata.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insertparcel.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มข้อมูลพัสดุ</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> -->
</head>
<?php include 'header.php'; ?>

<body>

    <div class="container">
        <h2 class="mt-3">เพิ่มข้อมูลพัสดุ</h2>
        <hr>
        <form action="check_insert_parcel.php" method="post">
            <div class="mb-3">
                <label for="messenger_id" class="form-label">เลขพัสดุ</label>
                <input type="text" class="form-control" name="messenger_id" placeholder="กรอกรหัสพัสดุ" required>
            </div>
            <br>
            <!-- <div class="mb-3">
                <label for="recipient_day">วันที่รับพัสดุ</label>&nbsp;&nbsp;&nbsp;
                <input type="date" name="recipient_day" required>
            </div>
            <br> -->
            <div class="mb-3">
                <label for="name_messenger">ชื่อ-สกุลผู้ส่งพัสดุ</label>
                <input type="text" class="form-control" name="name_messenger" placeholder="กรอกชื่อ-สกุลผู้ส่งพัสดุ" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="phone_messenger">เบอร์โทรผู้ส่งพัสดุ</label>
                <input type="idNumber" class="form-control" name="phone_messenger" placeholder="กรอกเบอร์โทร" pattern="[0-9]{10}" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="user_id">รหัสผู้ส่งพัสดุ</label>
                <input type="text" class="form-control" name="user_id" placeholder="กรอกชื่อ-สกุลผู้ส่งพัสดุ" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="recipient_name">ชื่อ-สกุลบนพัสดุ</label>
                <input type="text" class="form-control" name="recipient_name" placeholder="กรอกชื่อ-สกุลบนพัสดุ" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="recipient_phone">เบอร์โทรบนพัสดุ</label>
                <input type="idNumber" class="form-control" name="recipient_phone" placeholder="กรอกชื่อ-สกุลเบอร์โทรบนพัสดุ" pattern="[0-9]{10}" required>
            </div>
            <br>
            <div class="mb-3">
            <label for="type_id">ประเภทผู้ขนส่งพัสดุ</label>&nbsp;&nbsp;&nbsp;
                <select name="type_id" id="type_id" class="form-control" required>
                    <option selected disabled >กรุณาเลือกผู้ขนส่ง</option>
                    <?php foreach ($query1 as $value1) { ?>
                        <option value="<?= $value1['messenger_name'] ?>"><?= $value1['messenger_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="major_id">หน่วยงาน</label>&nbsp;&nbsp;&nbsp;
                <select name="major_id" class="form-control" required>
                    <option selected disabled>กรุณาเลือกหน่วยงาน</option>
                    <?php foreach ($result as $results) { ?>
                        <option value="<?php echo $results["faculty_name"]; ?>">
                            <?php echo $results["faculty_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="recipient_status">สถานะพัสดุ</label>&nbsp;&nbsp;&nbsp;
                <select name="recipient_status" id="recipient_status" class="form-control" required>
                    <option selected disabled>กรุณาเลือกสถานะ</option>
                        <option value="รับแล้ว">รับแล้ว</option>
                        <option value="ยังไม่รับ">ยังไม่รับ</option>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="admin_id">ชื่อเจ้าหน้าที่ฝ่ายพัสดุ</label>
                <input type="text" class="form-control" name="admin_id" placeholder="ลงชื่อเจ้าหน้าที่" required>
            </div>
            <hr>
            <button type="submit" name="insertparcel" class="btn btn-success">บันทึก</button><br><br><br><br><br>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
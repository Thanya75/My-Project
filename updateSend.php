<?php

include_once('functions.php');
include('server.php');
$updatesend = new DB_con();
$sql = "SELECT * FROM td_faculty";
$query = mysqli_query($conn, $sql);
if (isset($_POST['updatesend'])) {

    $sendid = $_GET['send_id'];
    $recipient_id = $_POST['recipient_id'];
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    // $send_day = $_POST['send_day'];
    $send_recipient = $_POST['send_recipient'];
    $faculty_id = $_POST['faculty_id'];
    $send_status = $_POST['send_status'];
    $admin_id = $_POST['admin_id'];


    $sql = $updatesend->updatesend($sendid, $recipient_id, $send_recipient, $faculty_id, $send_status, $admin_id, $user_name, $user_id);
    if ($sql) {
        echo "<script>alert('แก้ไขข้อมูล เรีบยร้อยแล้วค่ะ!');</script>";
        echo "<script>window.location.href='send_data.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='updateSend.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไขข้อมูลจ่ายพัสดุ</title>


</head>
<?php include 'header.php'; ?>

<body>

    <div class="container">
        <h2 class="mt-3">แก้ไขข้อมูลจ่ายพัสดุ</h2>
        <hr>
        <?php

        $sendid = $_GET['send_id'];
        $updatesend = new DB_con();
        $sql = $updatesend->sendcord($sendid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="recipient_id" class="form-label">เลขพัสดุ</label>
                    <input type="text" class="form-control" name="recipient_id" value="<?php echo $row['recipient_id']; ?>" required>
                </div>
                <br>
                <!-- <div class="mb-3">
                    <label for="send_day">วันที่จ่ายพัสดุ</label>&nbsp;&nbsp;&nbsp;
                <input type="date" name="send_day" value="<?php echo $row['send_day']; ?>" required>
                </div>
                <br> -->
                <div class="mb-3">
                    <label for="user_id">รหัสเจ้าของพัสดุ</label>
                    <input type="number" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="user_name">ชื่อเจ้าของพัสดุ</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="send_recipient">ขื่อผู้รับพัสดุ</label>
                    <input type="text" class="form-control" name="send_recipient" value="<?php echo $row['send_recipient']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="faculty_id">คณะ</label>&nbsp;&nbsp;&nbsp;
                    <select name="faculty_id" id="faculty_id" required>
                        <option value="<?php echo $row['faculty_id']; ?>"><?php echo $row['faculty_id']; ?></option>
                        <?php foreach ($query as $value) { ?>
                            <option value="<?= $value['faculty_name'] ?>"><?= $value['faculty_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="send_status">สถานะผู้รับพัสดุ</label>&nbsp;&nbsp;&nbsp;
                    <select name="send_status" id="send_status" required>
                        <option value="<?php echo $row['send_status']; ?>"><?php echo $row['send_status']; ?></option>
                        <option value="รับด้วยตนเอง">รับด้วยตนเอง</option>
                        <option value="รับแทน">รับแทน</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="admin_id">ชื่อเจ้าหน้าที่ฝ่ายพัสดุ</label>
                    <input type="text" class="form-control" name="admin_id" value="<?php echo $row['admin_id']; ?>" required>
                </div>
                <br>

            <?php } ?>
            <hr>
            <button type="submit" name="updatesend" class="btn btn-success">บันทึก</button><br><br><br><br><br>
            </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
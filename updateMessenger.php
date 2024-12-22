<?php

include_once('functions.php');

$updatemessenger = new DB_con();

if (isset($_POST['updatemessenger'])) {
    $messengerid = $_GET['messenger_id'];
    $messenger_name = $_POST['messenger_name'];
    $mobile_num = $_POST['mobile_num'];
    
    $sql = $updatemessenger->updatemessenger($messengerid, $messenger_name, $mobile_num);
    if ($sql) {
        echo "<script>alert('แก้ไขข้อมูล เรีบยร้อยแล้วค่ะ!');</script>";
        echo "<script>window.location.href='messenger_data.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='updateMessenger.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไขข้อมูลผู้ขนส่งพัสดุ</title>


</head>
<?php include 'header.php';?>
<body>

    <div class="container">
        <h2 class="mt-3">แก้ไขข้อมูลผู้ขนส่งพัสดุ</h2>
        <hr>
        <?php

        $messengerid = $_GET['messenger_id'];
        $updatemessenger = new DB_con();
        $sql = $updatemessenger->messengercord($messengerid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="messenger_name" class="form-label">ชื่อผู้ขนส่งพัสดุ</label>
                    <input type="text" class="form-control" name="messenger_name" value="<?php echo $row['messenger_name']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="mobile_num">เบอร์โทรผู้ขนส่งพัสดุ</label>
                    <input type="number" class="form-control" name="mobile_num" value="<?php echo $row['mobile_num']; ?>" required>
                </div>
                <br>
                
            <?php } ?>
            <hr>
            <button type="submit" name="updatemessenger" class="btn btn-success">บันทึก</button><br><br><br><br><br>
            </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
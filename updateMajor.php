<?php

include_once('functions.php');
include('server.php');
$updatemajor = new DB_con();
$sql = "SELECT * FROM td_faculty";
$query = mysqli_query($conn, $sql);
if (isset($_POST['updatemajor'])) {

    $majorid = $_GET['major_id'];
    $major_name = $_POST['major_name'];
    $faculty_id = $_POST['faculty_id'];
    $major_phone = $_POST['major_phone'];

    $sql = $updatemajor->updatemajor($majorid, $major_name, $faculty_id, $major_phone);
    if ($sql) {
        echo "<script>alert('แก้ไขข้อมูล เรีบยร้อยแล้วค่ะ!');</script>";
        echo "<script>window.location.href='major_data.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='updatemajor.php'</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไขข้อมูลคณะ</title>


</head>
<?php include 'header.php'; ?>

<body>

    <div class="container">
        <h2 class="mt-3">แก้ไขข้อมูลคณะ</h2>
        <hr>
        <?php

        $majorid = $_GET['major_id'];
        $updatemajor = new DB_con();
        $sql = $updatemajor->majorcord($majorid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="major_name" class="form-label">ชื่อหน่วยงานสาขา</label>
                    <input type="text" class="form-control" name="major_name" value="<?php echo $row['major_name']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="faculty_id">คณะ</label>&nbsp;&nbsp;&nbsp;
                    <select name="faculty_id" id="faculty_id">
                        <option value="<?php echo $row['faculty_id']; ?>"><?php echo $row['faculty_id']; ?></option>
                        <?php foreach ($query as $value) { ?>
                            <option value="<?= $value['faculty_name'] ?>"><?= $value['faculty_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="major_phone">เบอร์โทรหน่วยงานสาขา</label>
                    <input type="number" class="form-control" name="major_phone" value="<?php echo $row['major_phone']; ?>" required>
                </div>
                <br>

            <?php } ?>
            <hr>
            <button type="submit" name="updatemajor" class="btn btn-success">บันทึก</button><br><br><br><br><br>
            </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
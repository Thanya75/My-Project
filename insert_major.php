<?php

include_once('functions.php');
include('server.php');
$insertmajor = new DB_con();
$sql = "SELECT * FROM td_faculty";
$query = mysqli_query($conn, $sql);
if (isset($_POST['insertmajor'])) {

    $major_name = $_POST['major_name'];
    $faculty_id = $_POST['faculty_id'];
    $major_phone = $_POST['major_phone'];


    $sql = $insertmajor->insertmajor($major_name, $faculty_id, $major_phone);

    if ($sql) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='major_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_major.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มข้อมูลสาขาวิชา</title>
</head>
<?php include 'header.php'; ?>

<body>

    <div class="container">

        <h2 class="mt-3">เพิ่มข้อมูลสาขาวิชา</h2>
        <hr>
        <form action="check_insert_major.php" method="post">
            <div class="mb-3">
                <label for="major_name" class="form-label">ชื่อสาขาวิชา</label>
                <input type="text" placeholder="กรอกชื่อสาขา" class="form-control" name="major_name" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="faculty_id">คณะ</label>&nbsp;&nbsp;&nbsp;
                <select name="faculty_id" id="faculty_id" required>
                    <option selected disabled>------------กรุณาเลือกคณะ------------</option>
                    <?php foreach ($query as $value) { ?>
                        <option value="<?= $value['faculty_name'] ?>"><?= $value['faculty_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="major_phone">เบอร์โทรสาขาวิชา</label>
                <input type="idNumber" placeholder="กรอกชื่อเบอร์โทรสาขา" class="form-control" name="major_phone" pattern="[0-9]{10}" required>
            </div>
            <br>
            <hr>
            <button type="submit" name="insertmajor" class="btn btn-success">บันทึก</button><br><br><br><br><br>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
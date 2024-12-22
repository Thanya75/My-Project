<?php

include_once('functions.php');

$updatefaculty = new DB_con();

if (isset($_POST['updatefaculty'])) {

    $facultyid = $_GET['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_phone = $_POST['faculty_phone'];
    

    $sql = $updatefaculty->updatefaculty($facultyid, $faculty_name, $faculty_phone);
    if ($sql) {
        echo "<script>alert('แก้ไขข้อมูล เรีบยร้อยแล้วค่ะ!');</script>";
        echo "<script>window.location.href='faculty_data.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='updateFaculty.php'</script>";
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
<?php include 'header.php';?>
<body>

    <div class="container">
        <h2 class="mt-3">แก้ไขข้อมูลคณะ</h2>
        <hr>
        <?php

        $facultyid = $_GET['faculty_id'];
        $updatefaculty = new DB_con();
        $sql = $updatefaculty->facultycord($facultyid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="faculty_name" class="form-label">ชื่อคณะ</label>
                    <input type="text" class="form-control" name="faculty_name" value="<?php echo $row['faculty_name']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="faculty_phone">เบอร์โทรคณะ</label>
                    <input type="number" class="form-control" name="faculty_phone" value="<?php echo $row['faculty_phone']; ?>" required>
                </div>
                <br>
                
            <?php } ?>
            <hr>
            <button type="submit" name="updatefaculty" class="btn btn-success">บันทึก</button><br><br><br><br><br>
            </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
<?php

include_once('functions.php');
include('server.php'); 
$updatedata = new DB_con();
$sql = "SELECT * FROM td_faculty";
$query = mysqli_query($conn, $sql);

if (isset($_POST['update'])) {
    
    $userid = $_GET['user_id'];
    $user_login = $_POST['user_login'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $faculty_id = $_POST['faculty_id'];
    $major_id = $_POST['major_id'];

    $sql = $updatedata->update($userid, $user_login, $user_name, $user_phone, $major_id, $faculty_id);
    if ($sql) {
        echo "<script>alert('แก้ไขข้อมูล เรีบยร้อยแล้วค่ะ!');</script>";
        echo "<script>window.location.href='user_data.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='update.php'</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไขข้อมูลบุคลากร</title>


</head>
<?php include 'header.php';?>
<body>

    <div class="container">
        <h2 class="mt-3">แก้ไขข้อมูลบุคลากร</h2>
        <hr>
        <?php

        $userid = $_GET['user_id'];
        $updateuser = new DB_con();
        $sql = $updateuser->fetchonerecord($userid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="user_login" class="form-label">รหัสประจำตัว</label>
                    <input type="number" class="form-control" name="user_login" value="<?php echo $row['user_login']; ?>" pattern="[0-9]{12}" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="user_name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name']; ?>" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="user_phone">เบอร์โทร</label>
                    <input type="number" class="form-control" name="user_phone" value="<?php echo $row['user_phone'];  ?>" pattern="[0-9]{12}" required>
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
                <label for="major_id">สาขาวิชา</label>&nbsp;&nbsp;&nbsp;
                <select name="major_id" id="major_id"></select>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#faculty_id').change(function() {
                        var faculty_name = $(this).val();
                        $.ajax({
                            type: "post",
                            url: "ajax_db.php",
                            data: {
                                faculty_name: faculty_name,
                                function: 'faculty_id'
                            },
                            success: function(data) {
                                console.log(data);
                                $('#major_id').html(data);
                            }
                        });
                    });
                })
            </script>
            <?php } ?>
            <hr>
            <button type="submit" name="update" class="btn btn-success">บันทึก</button><br><br><br><br><br>
            </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
<?php

include_once('functions.php');
include('server.php');

$insertdata = new DB_con();
$sql1 = "SELECT * FROM td_faculty";
$query = mysqli_query($conn, $sql1);

if (isset($_POST['insert'])) {
    $user_login = $_POST['user_login'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $major_id = $_POST['major_id'];
    $faculty_id = $_POST['faculty_id'];

    $sql = $insertdata->insert($user_login, $user_name, $user_phone, $major_id, $faculty_id);

    if ($sql) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='user_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มข้อมูลบุคลากร</title>
</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">เพิ่มข้อมูลบุคลากร</h2>
        <hr>
        <form action="check_insert.php" method="post">
            <div class="mb-3">
                <label for="user_login" class="form-label">รหัสประจำตัว</label>
                <input type="idNumber" placeholder="กรอกรหัสประจำตัว" class="form-control" name="user_login" pattern="[0-9]{12}" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="user_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" placeholder="กรอกชื่อและนามสกุล" class="form-control" name="user_name" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="user_phone">เบอร์โทร</label>
                <input type="idNumber" placeholder="กรอกเบอร์โทร" class="form-control" name="user_phone" pattern="[0-9]{10}" required>
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
                <label for="major_id">สาขาวิชา</label>&nbsp;&nbsp;&nbsp;
                <select name="major_id" id="major_id" required></select>
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
            <hr>
            <button type="submit" name="insert" class="btn btn-success">บันทึก</button><br><br><br><br><br>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
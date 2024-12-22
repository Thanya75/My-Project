<!DOCTYPE html>
<html lang="en">
<?php
require('server.php');
$name = $_POST["major_name"]; //สม 

$sql = "SELECT * FROM td_major WHERE major_name LIKE '%$name%' OR faculty_id LIKE '%$name%' OR major_phone LIKE '%$name%' ORDER BY faculty_id ASC";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$order = 1;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลสาขาวิชา</title>

</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลสาขาวิชา</h2>

        <form action="searchMajor.php" class="form-group" method="POST">
            <label for="">ค้นหาข้อมูล</label>
            <input type="text" placeholder="ใส่คำค้นหา" name="major_name" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>
        <!-- <a href="major_data.php" class="btn btn-success">ย้อนกลับ</a> -->
        <br>
        <?php if ($count > 0) { ?>
            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>รหัส</th>
                    <th>สาขาวิชา</th>
                    <th>คณะ</th>
                    <th>เบอร์โทร</th>
                    <th>จัดการ</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['major_id']; ?></td>
                            <td><?php echo $row['major_name']; ?></td>
                            <td><?php echo $row['faculty_id']; ?></td>
                            <td><?php echo $row['major_phone']; ?></td>
                            
                            <td><a href="updateMajor.php?major_id=<?php echo $row['major_id']; ?>" class="btn btn-primary">แก้ไข</a>
                                <a href="deleteMajor.php?del=<?php echo $row['major_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <?php } else { ?>
            <div class="alert alert-danger">
                <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
            </div>
        <?php } ?>
        <a href="major_data.php" class="btn btn-success">ย้อนกลับ</a><br><br><br><br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
<script>
    function checkAll() {
        var form_element = document.forms[1].length;
        for (i = 0; i < form_element - 1; i++) {
            document.forms[1].elements[i].checked = true;
        }
    }

    function uncheckAll() {
        var form_element = document.forms[1].length;
        for (i = 0; i < form_element - 1; i++) {
            document.forms[1].elements[i].checked = false;
        }
    }
</script>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
require('server.php');
$name = $_POST["messenger_name"]; //สม

$sql = "SELECT * FROM td_messenger WHERE messenger_name LIKE '%$name%' OR mobile_num LIKE '%$name%'  
ORDER BY messenger_id asc";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$order = 1;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลผู้ขนส่งพัสดุ</title>

</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลผู้ขนส่งพัสดุ</h2>

        <form action="searchMessenger.php" class="form-group" method="POST">
            <label for="">ค้นหาข้อมูล</label>
            <input type="text" placeholder="ใส่คำค้นหา" name="messenger_name" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>

        <br>
        <?php if ($count > 0) { ?>
            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>รหัส</th>
                    <th>ชื่อผู้ขนส่ง</th>
                    <th>เบอร์โทร</th>
                    <th>จัดการ</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['messenger_id']; ?></td>
                            <td><?php echo $row['messenger_name']; ?></td>
                            <td><?php echo $row['mobile_num']; ?></td>

                            <td><a href="updateMessenger.php?messenger_id=<?php echo $row['messenger_id']; ?>" class="btn btn-primary">แก้ไข</a>
                                <a href="deleteMessenger.php?del=<?php echo $row['messenger_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <?php } else { ?>
            <div class="alert alert-danger">
                <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
            </div>
        <?php } ?>
        <a href="messenger_data.php" class="btn btn-success">กลับหน้าแรก</a>
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
<!DOCTYPE html>
<html lang="en">
<?php
require('server.php');
$name = $_POST["parcel"]; // สม

$sql = "SELECT * FROM td_recipient WHERE messenger_id LIKE '%$name%' OR name_messenger LIKE '%$name%' OR phone_messenger LIKE '%$name%' OR recipient_name LIKE '%$name%' OR recipient_day LIKE '%$name%' OR recipient_status LIKE '%$name%'
ORDER BY recipient_id asc";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$order = 1;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลบุคลากร</title>

</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลบุคลากร</h2>

        <form action="searchParcel.php" class="form-group" method="POST">
            <label for="">ค้นหาพัสดุ</label>
            <input type="text" placeholder="ป้อนข้อมูลพัสดุ" name="parcel" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>

        <br>
        <?php if ($count > 0) { ?>

            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>รหัสรับพัสดุ</th>
                    <th>เลขพัสดุ</th>
                    <th width="9%">วันเวลารับพัสดุ</th>
                    <th width="10%">ชื่อ-สกุลผู้ส่งพัสดุ</th>
                    <th>เบอร์โทรผู้ส่งพัสดุ</th>
                    <th width="11%">ชื่อ-สกุลผู้รับพัสดุ</th>
                    <th>เบอร์โทรบนพัสดุ</th>
                    <th>หน่วยงาน</th>
                    <th>ประเภทพัสดุ</th>
                    <th>สถานะ</th>
                    <th>ชื่อเจ้าหน้าที่ฝ่ายพัสดุ</th>
                    <th width="11%">จัดการ</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                        <tr>
                            <td><?php echo $row['recipient_id']; ?></td>
                            <td><?php echo $row['messenger_id']; ?></td>
                            <td><?php echo $row['recipient_day']; ?></td>
                            <td><?php echo $row['name_messenger']; ?></td>
                            <td><?php echo $row['phone_messenger']; ?></td>
                            <td><?php echo $row['recipient_name']; ?></td>
                            <td><?php echo $row['recipient_phone']; ?></td>
                            <td><?php echo $row['major_id']; ?></td>
                            <td><?php echo $row['type_id']; ?></td>
                            <td><?php echo $row['recipient_status']; ?></td>
                            <td><?php echo $row['admin_id']; ?></td>
                            <td><a href="updateparcel.php?recipient_id=<?php echo $row['recipient_id']; ?>" class="btn btn-primary">แก้ไข</a>
                                <a href="deleteparcel.php?del=<?php echo $row['recipient_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <?php } else { ?>
            <div class="alert alert-danger">
                <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
            </div>
        <?php } ?>
        <a href="parcel_data.php" class="btn btn-success">กลับหน้าแรก</a>
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
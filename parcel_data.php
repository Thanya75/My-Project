<?php include 'pagination.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลพัสดุ</title>
</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลพัสดุ</h2>
        <form action="searchParcel.php" class="form-group" method="POST">
            <label for="">ค้นหาข้อมูลพัสดุ</label>
            <input type="text" placeholder="ป้อนข้อมูลพัสดุ" name="parcel" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>
        <br>
        <a href="insert_parcel.php" class="btn btn-success">ลงทะเบียนพัสดุ</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th width="8%">รหัสรับพัสดุ</th>
                <th>เลขพัสดุ</th>
                <th width="9%">วันเวลารับ</th>
                <th width="10%">ชื่อผู้ส่งพัสดุ</th>
                <th>เบอร์โทรผู้ส่ง</th>
                <th width="10%">ชื่อผู้รับพัสดุ</th>
                <th>เบอร์โทรบนพัสดุ</th>
                <th>หน่วยงาน</th>
                <th>ประเภทพัสดุ</th>
                <th>สถานะ</th>
                <th>จัดการ</th>              
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_array($nquery)) {
                ?>
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
                        <!-- <td><?php echo $row['admin_id']; ?></td> -->
                        <td><a href="updateparcel.php?recipient_id=<?php echo $row['recipient_id']; ?>" class="btn btn-primary">แก้ไข</a><br>
                            <a href="deleteparcel.php?del=<?php echo $row['recipient_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล?')" class="btn btn-danger">ลบ</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div><br>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</body>

</html>
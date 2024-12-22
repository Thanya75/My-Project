<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลผู้ขนส่ง</title>

</head>
<?php include 'header.php'; ?>

<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลผู้ขนส่ง</h2>

        <form action="searchMessenger.php" class="form-group" method="POST">
            <label for="">ค้นหาผู้ขนส่ง</label>
            <input type="text" placeholder="ป้อนข้อมูลผู้ขนส่ง" name="messenger_name" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>

        <br>
        <a href="insert_messenger.php" class="btn btn-success">เพิ่มข้อมูล</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>รหัส</th>
                <th>ชื่อผู้ขนส่ง</th>
                <th>เบอร์โทร</th>
            </thead>

            <tbody>
                <?php
                include_once('functions.php');
                $messengerdata = new DB_con();
                $sql = $messengerdata->messengerdata();
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['messenger_id']; ?></td>
                        <td><?php echo $row['messenger_name']; ?></td>
                        <td><?php echo $row['mobile_num']; ?></td>                                          
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
        

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
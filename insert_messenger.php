<?php 

    include_once('functions.php');

    $insertmessenger = new DB_con();

    if (isset($_POST['insertmessenger'])) {

        $messenger_name = $_POST['messenger_name'];
        $mobile_num = $_POST['mobile_num'];
        
        $sql = $insertmessenger->insertmessenger($messenger_name, $mobile_num);

        if ($sql) {
            echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
            echo "<script>window.location.href='messenger_data.php'</script>";
        } else {
            echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
            echo "<script>window.location.href='insert_messenger.php'</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มข้อมูลผู้ขนส่ง</title>
</head>
<?php include 'header.php';?>
<body>

    <div class="container">
    
        <h2 class="mt-3">เพิ่มข้อมูลผู้ขนส่ง</h2>
        <hr>
        <form action="check_insert_messenger.php" method="post">
            <div class="mb-3">
                <label for="messenger_name" class="form-label">ชื่อหน่วยงาน</label>
                <input type="text" placeholder="กรอกชื่อผู้ขนส่ง" class="form-control" name="messenger_name" required>
            </div>
            <br>           
            <div class="mb-3">
                <label for="mobile_num">เบอร์โทร</label>
                <input type="idNumber" placeholder="กรอกเบอร์โทร" class="form-control" name="mobile_num" pattern="[0-9]{10}" required>
            </div>
            <br>
            
            <hr>
            <button type="submit" name="insertmessenger" class="btn btn-success">บันทึก</button><br><br><br><br><br>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html> 
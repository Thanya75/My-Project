<?php
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$messenger_name = $_POST['messenger_name'];
$mobile_num = $_POST['mobile_num'];


$query = "SELECT messenger_name FROM td_messenger WHERE messenger_name = '$messenger_name'";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('ข้อมูลซ้ำ! โปรดระบุข้อมูลใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert_messenger.php'</script>";
} else {
    $sql = $insertdata->insertmessenger($messenger_name, $mobile_num);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='messenger_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_messenger.php'</script>";
    }
}
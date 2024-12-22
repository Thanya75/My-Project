<?php
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$major_name = $_POST['major_name'];
$faculty_id = $_POST['faculty_id'];
$major_phone = $_POST['major_phone'];


$query = "SELECT major_name FROM td_major WHERE major_name = '$major_name' ";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('ข้อมูลซ้ำ! โปรดระบุข้อมูลใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert_major.php'</script>";
} else {
    $sql = $insertdata->insertmajor($major_name, $faculty_id, $major_phone);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='major_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_major.php'</script>";
    }
}

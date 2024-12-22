<?php
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$faculty_name = $_POST['faculty_name'];
$faculty_phone = $_POST['faculty_phone'];

$query = "SELECT faculty_name FROM td_faculty WHERE faculty_name = '$faculty_name' ";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('ข้อมูลซ้ำ! โปรดระบุข้อมูลใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert_faculty.php.php'</script>";
} else {
    $sql = $insertdata->insertfaculty($faculty_name, $faculty_phone);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='faculty_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_faculty.php'</script>";
    }
}

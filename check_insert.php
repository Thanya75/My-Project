<?php 
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$user_login = $_POST['user_login'];
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$major_id = $_POST['major_id'];
$faculty_id = $_POST['faculty_id'];
// ตรวจข้อมูลสิ่งที่ห้ามซ้ำ
$query = "SELECT user_name FROM td_user WHERE user_login = '$user_login' OR user_name = '$user_name' OR user_phone = '$user_phone' ";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('ข้อมูลซ้ำ! โปรดระบุข้อมูลใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert.php'</script>";
} else {
    $sql = $insertdata->insert($user_login, $user_name, $user_phone, $major_id, $faculty_id);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='user_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}
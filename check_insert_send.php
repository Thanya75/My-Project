<?php
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$recipient_id = $_POST['recipient_id'];
// $send_day = $_POST['send_day'];
$send_recipient = $_POST['send_recipient'];
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$faculty_id = $_POST['faculty_id'];
$send_status = $_POST['send_status'];
$admin_id = $_POST['admin_id'];
$recipient_status = $_POST['recipient_status'];
$recipientid = $_GET['recipient_id'];

// ตรวจข้อมูลสิ่งที่ห้ามซ้ำ
$query = "SELECT recipient_id FROM td_send WHERE recipient_id = '$recipient_id' ";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('รหัสพัสดุซ้ำ! โปรดระบุใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert_send.php'</script>";
} else {
    $sql = $insertdata->insertsend($recipient_id, $send_recipient, $faculty_id, $send_status, $admin_id, $user_id, $user_name);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='send_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_send.php'</script>";
    }
}

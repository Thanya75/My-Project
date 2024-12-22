<?php
include_once('functions.php');
include('server.php');
$insertdata = new DB_con();

$messenger_id = $_POST['messenger_id'];
// $recipient_day = $_POST['recipient_day'];
$user_id = $_POST['user_id'];
$admin_id = $_POST['admin_id'];
$name_messenger = $_POST['name_messenger'];
$phone_messenger = $_POST['phone_messenger'];
$type_id = $_POST['type_id'];
$major_id = $_POST['major_id'];
$recipient_name = $_POST['recipient_name'];
$recipient_phone = $_POST['recipient_phone'];
$recipient_status = $_POST['recipient_status'];

$query = "SELECT messenger_id FROM td_recipient WHERE messenger_id = '$messenger_id' ";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    echo "<script>alert('รหัสพัสดุซ้ำ! โปรดระบุใหม่อีกครั้ง!');</script>";
    echo "<script>window.location.href='insert_parcel.php'</script>";
} else {
    $sql = $insertdata->insertparcel($messenger_id, $user_id, $admin_id, $name_messenger, $phone_messenger, $type_id, $major_id, $recipient_name, $recipient_phone, $recipient_status);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จแล้วค่ะ!');</script>";
        echo "<script>window.location.href='parcel_data.php'</script>";
    } else {
        echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
        echo "<script>window.location.href='insert_parcel.php'</script>";
    }
}

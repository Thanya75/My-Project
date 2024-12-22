<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $userid = $_GET['del'];
        $senddelete = new DB_con();
        $sql = $senddelete->senddelete($userid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='send_data.php'</script>";
            
        }
    }

?> 
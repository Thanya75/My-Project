<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $recipientid = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->frmdelete($recipientid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='parcel_data.php'</script>";
            
        }
    }

?> 
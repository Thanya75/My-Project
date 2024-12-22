<?php 
    include_once('functions.php');
    if (isset($_GET['del'])) {
        $userid = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->delete($userid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='user_data.php'</script>";
            
        }
    }

?> 
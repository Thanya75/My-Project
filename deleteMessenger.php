<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $messengerid = $_GET['del'];
        $messengerdelete = new DB_con();
        $sql = $messengerdelete->messengerdelete($messengerid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='messenger_data.php'</script>";
            
        }
    }

?> 
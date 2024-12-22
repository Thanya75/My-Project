<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $majorid = $_GET['del'];
        $majordelete = new DB_con();
        $sql = $majordelete->majordelete($majorid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='major_data.php'</script>";
            
        }
    }

?> 